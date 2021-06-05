<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TasksList extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function tasks(){
        return $this->hasMany(Task::class);
    }
}
