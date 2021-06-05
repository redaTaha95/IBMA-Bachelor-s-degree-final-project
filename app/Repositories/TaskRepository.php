<?php


namespace App\Repositories;


use App\Models\Employee;
use App\Models\Project;
use App\Models\Task;
use App\Models\TasksList;

class TaskRepository extends BaseRepository implements Interfaces\TaskRepositoryInterface
{
    public function __construct(Task $model)
    {
        parent::__construct($model);
    }

    public function getTasksList()
    {
        return TasksList::all();
    }

    public function getEmployees()
    {
        return Employee::all();
    }

    public function getProjects()
    {
        return Project::all();
    }

    public function affectTaskToEmployee($task_id, $employee_id)
    {
        $task = Task::find($task_id);
        $task->employees()->attach($employee_id);
    }
}
