<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RecruitmentDemand extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

<<<<<<< HEAD
    public function candidates(){
        return $this->belongsToMany(Candidate::class, 'candidate_recruitment_demand');
=======
    public function employee(){
        return $this->belongsTo('app\Models\Employee');
>>>>>>> ba6073d842059f023397fb9416320862e7630b67
    }
}
