<?php


namespace App\Repositories;


use App\Models\RecruitmentDemand;

class RecruitmentDemandRepository extends BaseRepository implements Interfaces\RecruitmentDemandRepositoryInterface
{
    public function __construct(RecruitmentDemand $model)
    {
        parent::__construct($model);
    }
}
