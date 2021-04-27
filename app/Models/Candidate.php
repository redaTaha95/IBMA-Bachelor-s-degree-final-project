<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Candidate extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function recruitment_demands(){
        return $this->belongsToMany(RecruitmentDemand::class, 'candidate_recruitment_demand');
    }
}
