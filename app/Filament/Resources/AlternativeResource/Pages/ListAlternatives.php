<?php

namespace App\Filament\Resources\AlternativeResource\Pages;

use App\Filament\Resources\AlternativeResource;
use App\Models\Alternative;
use Dompdf\Dompdf;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAlternatives extends ListRecords
{
    protected static string $resource = AlternativeResource::class;
    protected static ?string $title = 'Data Alternative';
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
        $htmlContent = view('print.alternative', ['alternatives' => Alternative::all()])->render();
        // Convert HTML to PDF
        $dompdf = new Dompdf();
        $pdf = $dompdf->loadHTML($htmlContent);

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to browser (force download)
        return response()->streamDownload(function () use ($dompdf) {
            echo $dompdf->output();
        }, 'alternative.pdf');
    }
}
