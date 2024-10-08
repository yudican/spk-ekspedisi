<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use App\Models\Criteria;
use App\Models\Score;
use Illuminate\Http\Request;

class PerhitunganController extends Controller
{
    public function index()
    {
        return view('print.perhitungan', ['data' => [
            'scores' =>  Score::groupBy('parent_id')->get(),
            'criterias' =>  Criteria::all(),
            'perhitungan' => $this->calculateSAW()
        ]]);
    }
    public function calculateSAW()
    {
        $scores = Score::groupBy('parent_id')->get();
        $criteria = Criteria::all();

        // Step 1: Create a matrix of scores
        $matrix = [];
        foreach ($scores as $score) {
            foreach ($criteria as $criterion) {
                $attribute = Attribute::whereHas('criteria', function ($query) use ($criterion) {
                    $query->where('criteria_id', $criterion->id);
                })->first();
                $matrix[$score->id][$criterion->id] = [
                    'id' => $criterion->id,
                    'value' => $attribute?->score,
                    'name' => $attribute->name,
                    'alternative_name' => $score->alternative->name,
                ];
            }
        }

        // Transform data into a matrix format
        $columns = [];
        foreach ($matrix as $alternativeId => $entries) {
            foreach ($entries as $entry) {
                $columns[$alternativeId][$entry['id']] = $entry['value'];
            }
        }
        // Step 2: Normalize the matrix
        $normalizedMatrix = [];
        foreach ($criteria as $criterion) {
            foreach ($scores as $alternative) {
                $column = $columns[$alternative->id];
                if ($criterion->is_benefit > 0) {
                    $normalizedMatrix[$alternative->id][$criterion->id] = [
                        'id' => $matrix[$alternative->id][$criterion->id]['id'],
                        'name' => $matrix[$alternative->id][$criterion->id]['name'],
                        'alternative_name' => $matrix[$alternative->id][$criterion->id]['alternative_name'],
                        'value' => $matrix[$alternative->id][$criterion->id]['value'] / max($column),
                    ];
                } else {
                    $normalizedMatrix[$alternative->id][$criterion->id] = [
                        'id' => $matrix[$alternative->id][$criterion->id]['id'],
                        'name' => $matrix[$alternative->id][$criterion->id]['name'],
                        'alternative_name' => $matrix[$alternative->id][$criterion->id]['alternative_name'],
                        'value' => min($column) / $matrix[$alternative->id][$criterion->id]['value'],
                    ];
                }
            }
        }

        // Step 3: Calculate the weighted sum
        $scores_maatrics = [];
        foreach ($criteria as $criterion) {
            foreach ($scores as $alternative) {
                $scores_maatrics[$alternative->id][$criterion->id]['value'] = 0;
                $scores_maatrics[$alternative->id][$criterion->id] = [
                    'id' => $normalizedMatrix[$alternative->id][$criterion->id]['id'],
                    'name' => $normalizedMatrix[$alternative->id][$criterion->id]['name'],
                    'alternative_name' => $normalizedMatrix[$alternative->id][$criterion->id]['alternative_name'],
                    'value' => $normalizedMatrix[$alternative->id][$criterion->id]['value'] * $criterion->weight,
                ];
            }
        }

        // Sort the nested arrays by 'value'
        foreach ($scores_maatrics as $alternative_id => &$criteriaArray) {
            usort($criteriaArray, function ($a, $b) {
                if ($a['value'] == $b['value']) {
                    return 0;
                }
                return ($a['value'] < $b['value']) ? -1 : 1;
            });
        }
        unset($criteriaArray); // Break reference
        return [
            'matrix' => $matrix,
            'normalizedMatrix' => $normalizedMatrix,
            'scores_maatrics' => $scores_maatrics,
        ];
    }
}
