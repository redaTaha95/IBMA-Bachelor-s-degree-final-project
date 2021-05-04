<?php


namespace App\Repositories\Interfaces;


interface PartnerRepositoryInterface
{
    public function addPartner($data);
    public function updatePartner($data, $id);
    public function storeImage($id, $file_name, $folder_name, $table);
    public function exportPartnersDataAsExcel();
}
