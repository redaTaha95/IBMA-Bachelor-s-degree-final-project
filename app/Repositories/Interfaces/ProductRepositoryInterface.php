<?php


namespace App\Repositories\Interfaces;


interface ProductRepositoryInterface
{
    public function addProduct($data);
    public function updateProduct($data, $id);
    public function storeImage($id, $file_name, $folder_name, $table);
    public function exportProductsDataAsExcel();
}
