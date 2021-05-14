<?php


namespace App\Repositories;


use App\Models\Sale;
use App\Exports\SaleExport;
use App\Models\Product;
use Maatwebsite\Excel\Facades\Excel;

class SaleRepository extends BaseRepository implements Interfaces\SaleRepositoryInterface
{
    public function __construct(Sale $model)
    {
        parent::__construct($model);
    }

    public function addSale($data)
    {
        $sale = $this->create($data);
        $this->storeImage($sale->id, 'logo', 'sales', 'sales');
    }

    public function updateSale($data, $id)
    {
        $this->update($data, $id);
        $sale = $this->find($id);
        $this->storeImage($sale->id, 'logo', 'sales', 'sales');
    }

    public function storeImage($id, $file_name, $folder_name, $table)
    {
        uploadImage($id, $file_name, $folder_name, $table);
    }

    public function exportSalesDataAsExcel()
    {
        return Excel::download(new SaleExport, 'sales.xlsx');
    }

    public function getProducts()
    {
        return Product::all();
    }
}
