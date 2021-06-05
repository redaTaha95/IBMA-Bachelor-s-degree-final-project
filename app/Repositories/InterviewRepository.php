<?php


namespace App\Repositories;


use App\Models\Interview;

class InterviewRepository extends BaseRepository implements Interfaces\InterviewRepositoryInterface
{

    public function __construct(Interview $model)
    {
        parent::__construct($model);
    }
}
