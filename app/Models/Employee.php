<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function recruitment_demands(){
        return $this->hasMany('app\Models\RecruitmentDemand');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function vacations(){
        return $this->hasMany(Vacation::class);
    }

    public function interviews()
    {
        return $this->hasMany(Interview::class);
    }

    public function meetings()
    {
        return $this->belongsToMany(Meeting::class);
    }

    public function tasks(){
        return $this->belongsToMany(Employee::class, 'employee_task');
    }
}
