<?php


namespace App\Repositories\Interfaces;


interface EmployeeRepositoryInterface
{
    public function addEmployee($data);
    public function updateEmployee($data, $id);
    public function storeImage($id, $file_name, $folder_name, $table);
}
