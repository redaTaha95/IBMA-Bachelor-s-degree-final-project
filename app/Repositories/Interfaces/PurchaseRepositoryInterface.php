<?php


namespace App\Repositories\Interfaces;


interface PurchaseRepositoryInterface
{
    public function addPurchase($data);
    public function updatePurchase($data, $id);
    public function storeImage($id, $file_name, $folder_name, $table);
    public function exportPurchasesDataAsExcel();
    public function getProducts();
}
