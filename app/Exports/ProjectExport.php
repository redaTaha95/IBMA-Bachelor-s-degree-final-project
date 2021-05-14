<?php


namespace App\Exports;


use Illuminate\Support\Collection;
use App\Models\Project;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;

class ProjectExport implements FromCollection, WithEvents, ShouldAutoSize, WithHeadings
{

    /**
     * @inheritDoc
     */
    public function collection()
    {
        return Project::select(
            'id',
            'client_id',
            'logo',
            'name',
            'description',
            'startDate',
            'dueDate',
            'budget'
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
            'client_id',
            'logo',
            'name',
            'description',
            'startDate',
            'dueDate',
            'budget'
        ];
    }
}
