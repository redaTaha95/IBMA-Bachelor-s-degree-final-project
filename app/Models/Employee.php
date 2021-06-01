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

}
