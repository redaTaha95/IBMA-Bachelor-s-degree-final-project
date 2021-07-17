<?php


namespace App\Repositories;


use App\Models\Candidate;
use App\Models\Training;

class TrainingRepository extends BaseRepository implements Interfaces\TrainingRepositoryInterface
{
    public function __construct(Training $model)
    {
        parent::__construct($model);
    }

    public function getCandidates()
    {
        return Candidate::all();
    }
}
