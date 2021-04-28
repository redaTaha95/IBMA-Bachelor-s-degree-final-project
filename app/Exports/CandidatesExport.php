<?php

namespace App\Exports;

use App\Models\Candidate;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;

class CandidatesExport implements FromCollection
{
    public function collection()
    {
        return Candidate::select(
            'id',
            'last_name',
            'first_name',
            'cin',
            'birthday',
            'phone',
            'email',
            'address',
            'city'
        )->get();
    }

    public function headings(): array
    {
        return [
            '#',
            'Nom',
            'Prénom',
            'CIN',
            'Date de naissance',
            'Téléphone',
            'Email',
            'Adresse',
            'Ville'
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
