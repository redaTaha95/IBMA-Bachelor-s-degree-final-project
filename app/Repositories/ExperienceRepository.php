<?php


namespace App\Repositories;


use App\Models\Candidate;
use App\Models\Experience;

class ExperienceRepository extends BaseRepository implements Interfaces\ExperienceRepositoryInterface
{
    public function __construct(Experience $model)
    {
        parent::__construct($model);
    }

    public function getCandidates()
    {
        return Candidate::all();
    }


}
