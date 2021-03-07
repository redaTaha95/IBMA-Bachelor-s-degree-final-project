<?php

namespace App\Providers;

use App\Repositories\BaseRepository;
use App\Repositories\CandidateRepository;
use App\Repositories\ClientRepository;
use App\Repositories\EmployeeRepository;
use App\Repositories\Interfaces\BaseRepositoryInterface;
use App\Repositories\Interfaces\CandidateRepositoryInterface;
use App\Repositories\Interfaces\ClientRepositoryInterface;
use App\Repositories\Interfaces\EmployeeRepositoryInterface;
use App\Repositories\Interfaces\ProjectRepositoryInterface;
use App\Repositories\Interfaces\RecruitmentDemandRepositoryInterface;
use App\Repositories\ProjectRepository;
use App\Repositories\RecruitmentDemandRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind(BaseRepositoryInterface::class, BaseRepository::class);
        $this->app->bind(ClientRepositoryInterface::class, ClientRepository::class);
        $this->app->bind(CandidateRepositoryInterface::class, CandidateRepository::class);
        $this->app->bind(EmployeeRepositoryInterface::class, EmployeeRepository::class);
        $this->app->bind(ProjectRepositoryInterface::class, ProjectRepository::class);
        $this->app->bind(RecruitmentDemandRepositoryInterface::class, RecruitmentDemandRepository::class);
    }


    public function boot()
    {
        //
    }
}
