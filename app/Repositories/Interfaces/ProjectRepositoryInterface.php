<?php


namespace App\Repositories\Interfaces;


interface ProjectRepositoryInterface
{
    public function addProject($data);
    public function updateProject($data, $id);
    public function storeImage($id, $file_name, $folder_name, $table);
    public function exportProjectsDataAsExcel();
    public function getClients();
}
