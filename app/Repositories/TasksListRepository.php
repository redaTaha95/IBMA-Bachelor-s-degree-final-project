<?php


namespace App\Repositories;


use App\Models\TasksList;

class TasksListRepository extends BaseRepository implements Interfaces\TasksListRepositoryInterface
{
    public function __construct(TasksList $model)
    {
        parent::__construct($model);
    }

    public function getTasksListsByProject($project_id)
    {
        return TasksList::where('project_id', $project_id)->get();
    }
}
