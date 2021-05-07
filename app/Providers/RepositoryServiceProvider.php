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
use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Repositories\Interfaces\ProjectRepositoryInterface;
use App\Repositories\Interfaces\PurchaseRepositoryInterface;
use App\Repositories\Interfaces\RecruitmentDemandRepositoryInterface;
use App\Repositories\Interfaces\SaleRepositoryInterface;
use App\Repositories\ProductRepository;
use App\Repositories\Interfaces\SupplierRepositoryInterface;
use App\Repositories\Interfaces\MaterialRepositoryInterface;
use App\Repositories\MaterialRepository;
use App\Repositories\Interfaces\PartnerRepositoryInterface;
use App\Repositories\PartnerRepository;
use App\Repositories\ProjectRepository;
use App\Repositories\PurchaseRepository;
use App\Repositories\RecruitmentDemandRepository;
use App\Repositories\SaleRepository;
use App\Repositories\SupplierRepository;
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
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
        $this->app->bind(SupplierRepositoryInterface::class, SupplierRepository::class);
        $this->app->bind(MaterialRepositoryInterface::class, MaterialRepository::class);
        $this->app->bind(PartnerRepositoryInterface::class, PartnerRepository::class);
        $this->app->bind(PurchaseRepositoryInterface::class, PurchaseRepository::class);
        $this->app->bind(SaleRepositoryInterface::class, SaleRepository::class);
    }


    public function boot()
    {

    }
}
