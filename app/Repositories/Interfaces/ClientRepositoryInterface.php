<?php


namespace App\Repositories\Interfaces;


interface ClientRepositoryInterface
{
    public function addClient($data);
    public function updateClient($data, $id);
    public function storeImage($id, $file_name, $folder_name, $table);
    public function exportClientsDataAsExcel();
}
