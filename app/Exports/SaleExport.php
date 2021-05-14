<?php


namespace App\Exports;


use Illuminate\Support\Collection;
use App\Models\Sale;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;

class SaleExport implements FromCollection, WithEvents, ShouldAutoSize, WithHeadings
{

    /**
     * @inheritDoc
     */
    public function collection()
    {
        return Sale::select(
            'id',
            'product_id',
            'logo',
            'title',
            'description',
            'price',
            'date'
        )->get();
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

    public function headings(): array
    {
        return [
            '#',
            'product_id',
            'logo',
            'title',
            'description',
            'price',
            'date'
        ];
    }
}
