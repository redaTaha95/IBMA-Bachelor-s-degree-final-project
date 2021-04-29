<?php


namespace App\Exports;

use App\Models\Partner;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;

class PartnerExport implements FromCollection,WithHeadings,ShouldAutoSize,WithEvents
{

    /**
     * @inheritDoc
     */
    public function collection()
    {
        return Partner::select(
            'id',
            'logo',
            'name',
            'city',
            'description',
            'income',
            'NumberOfEmployees'
        )->get();
    }

    public function headings(): array
    {
        return [
            '#',
            'logo',
            'name',
            'city',
            'description',
            'income',
            'NumberOfEmployees'
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:W1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
            },
        ];
    }
}
