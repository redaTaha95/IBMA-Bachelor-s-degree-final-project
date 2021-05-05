<?php


namespace App\Repositories\Interfaces;


interface SaleRepositoryInterface
{
    public function addSale($data);
    public function updateSale($data, $id);
    public function storeImage($id, $file_name, $folder_name, $table);
    public function exportSalesDataAsExcel();
    public function getProducts();
}
