<?php


namespace App\Repositories;

use App\Exports\PurchaseExport;
use App\Models\Product;
use App\Models\Purchase;
use Maatwebsite\Excel\Facades\Excel;


class PurchaseRepository extends BaseRepository implements Interfaces\PurchaseRepositoryInterface
{

    public function __construct(Purchase $model)
    {
        parent::__construct($model);
    }

    public function addPurchase($data)
    {
        $purchase = $this->create($data);
        $this->storeImage($purchase->id, 'logo', 'purchases', 'purchases');
    }

    public function updatePurchase($data, $id)
    {
        $this->update($data, $id);
        $purchase = $this->find($id);
        $this->storeImage($purchase->id, 'logo', 'purchases', 'purchases');
    }

    public function storeImage($id, $file_name, $folder_name, $table)
    {
        uploadImage($id, $file_name, $folder_name, $table);
    }

    public function exportPurchasesDataAsExcel()
    {
        return Excel::download(new PurchaseExport, 'purchases.xlsx');
    }

    public function getProducts()
    {
        return Product::all();
    }
}
