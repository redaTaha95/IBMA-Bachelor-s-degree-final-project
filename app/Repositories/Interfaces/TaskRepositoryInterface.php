<?php


namespace App\Repositories\Interfaces;


interface TaskRepositoryInterface
{
    public function getTasksList();
    public function getEmployees();
    public function getProjects();
    public function affectTaskToEmployee($task_id, $employee_id);
}
