<?php

namespace App\Filament\Resources\AttributeResource\Pages;

use App\Filament\Resources\AttributeResource;
use App\Models\Attribute;
use App\Models\Criteria;
use Dompdf\Dompdf;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAttributes extends ListRecords
{
    protected static string $resource = AttributeResource::class;
    protected static ?string $title = 'Data Atribut';
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
        $htmlContent = view('print.attribute', ['attributes' => Attribute::all()])->render();
        // Convert HTML to PDF
        $dompdf = new Dompdf();
        $pdf = $dompdf->loadHTML($htmlContent);

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to browser (force download)
        return response()->streamDownload(function () use ($dompdf) {
            echo $dompdf->output();
        }, 'attribute.pdf');
    }
}
