<?php


namespace App\Repositories\Interfaces;


interface TaskRepositoryInterface
{
    public function getEmployees();
    public function getProject($id);
    public function affectTaskToEmployee($task_id, $employee_id);
}
