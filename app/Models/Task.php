<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function tasks_list(){
        return $this->belongsTo(TasksList::class);
    }

    public function project(){
        return $this->belongsTo(Project::class);
    }

    public function employees(){
        return $this->belongsToMany(Task::class, 'employee_task');
    }
}
