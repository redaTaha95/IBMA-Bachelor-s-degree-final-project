<?php


namespace App\Repositories\Interfaces;


interface TasksListRepositoryInterface
{
    public function getTasksListsByProject($project_id);
}
