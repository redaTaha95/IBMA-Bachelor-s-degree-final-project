<?php

namespace App\Exports;

use App\Models\Supplier;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;

class SuppliersExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{
    public function collection()
    {
        return Supplier::select(
            'id',
            'full_name',
            'cin',
            'address',
            'postal_code',
            'city',
            'country',
            'phone',
            'email'
        )->get();
    }

    public function headings(): array
    {
        return [
            '#',
            'Nom & Prénom',
            'CIN',
            'Adresse',
            'Code Postal',
            'Ville',
            'Pays',
            'Téléphone',
            'Email'
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
