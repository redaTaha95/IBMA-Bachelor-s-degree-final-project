<?php


namespace App\Repositories;


use App\Exports\SuppliersExport;
use App\Models\Supplier;
use Maatwebsite\Excel\Facades\Excel;

class SupplierRepository extends BaseRepository implements Interfaces\SupplierRepositoryInterface
{
    public function __construct(Supplier $model)
    {
        parent::__construct($model);
    }

    public function exportSuppliersDataAsExcel()
    {
        return Excel::download(new SuppliersExport, 'suppliers.xlsx');
    }
}
