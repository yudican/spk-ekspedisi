<?php

namespace App\Filament\Resources\CriteriaResource\Pages;

use App\Filament\Resources\CriteriaResource;
use App\Models\Criteria;
use Dompdf\Dompdf;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCriterias extends ListRecords
{
    protected static string $resource = CriteriaResource::class;
    protected static ?string $title = 'Data Kriteria';
    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Actions\Action::make('exportPdf')
                ->label('Export PDF')
                ->action('exportPdf'),
        ];
    }


    public function exportPdf()
    {
        $htmlContent = view('print.kriteria', ['criterias' => Criteria::all()])->render();
        // Convert HTML to PDF
        $dompdf = new Dompdf();
        $pdf = $dompdf->loadHTML($htmlContent);

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to browser (force download)
        return response()->streamDownload(function () use ($dompdf) {
            echo $dompdf->output();
        }, 'kriteria.pdf');
    }
}
