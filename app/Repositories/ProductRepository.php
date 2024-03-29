<?php


namespace App\Repositories;


use App\Exports\ProductExport;
use App\Models\Product;
use App\Models\Supplier;
use Maatwebsite\Excel\Facades\Excel;

class ProductRepository extends BaseRepository implements Interfaces\ProductRepositoryInterface
{
    public function __construct(Product $model)
    {
        parent::__construct($model);
    }

    public function addProduct($data)
    {
        $product = $this->create($data);
        $this->storeImage($product->id, 'image', 'products', 'products');
    }

    public function updateProduct($data, $id)
    {
        $this->update($data, $id);
        $product = $this->find($id);
        $this->storeImage($product->id, 'image', 'products', 'products');
    }

    public function storeImage($id, $file_name, $folder_name, $table)
    {
        uploadImage($id, $file_name, $folder_name, $table);
    }

    public function exportProductsDataAsExcel()
    {
        return Excel::download(new ProductExport, 'products.xlsx');
    }

    public function getSuppliers()
    {
        return Supplier::all();
    }
}
