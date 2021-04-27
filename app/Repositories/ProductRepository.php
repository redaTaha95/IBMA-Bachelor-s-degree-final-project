<?php


namespace App\Repositories;


use App\Models\Product;

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
}
