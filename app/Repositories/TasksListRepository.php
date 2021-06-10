<?php


namespace App\Repositories;


use App\Models\TasksList;

class TasksListRepository extends BaseRepository implements Interfaces\TasksListRepositoryInterface
{
    public function __construct(TasksList $model)
    {
        parent::__construct($model);
    }
}
