<?php


namespace App\Repositories;


use App\Models\Candidate;

class CandidateRepository extends BaseRepository implements Interfaces\CandidateRepositoryInterface
{
    public function __construct(Candidate $model)
    {
        parent::__construct($model);
    }
}
