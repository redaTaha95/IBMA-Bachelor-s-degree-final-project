<?php

namespace App\Providers;

use App\Repositories\AppointmentRepository;
use App\Repositories\BaseRepository;
use App\Repositories\CalendarRepository;
use App\Repositories\CandidateRepository;
use App\Repositories\ClientAppointmentRepository;
use App\Repositories\ClientRepository;
use App\Repositories\EmployeeRepository;
use App\Repositories\ExperienceRepository;
use App\Repositories\Interfaces\AppointmentRepositoryInterface;
use App\Repositories\Interfaces\BaseRepositoryInterface;
use App\Repositories\Interfaces\CalendarRepositoryInterface;
use App\Repositories\Interfaces\CandidateRepositoryInterface;
use App\Repositories\Interfaces\ClientAppointmentRepositoryInterface;
use App\Repositories\Interfaces\ClientRepositoryInterface;
use App\Repositories\Interfaces\EmployeeRepositoryInterface;
use App\Repositories\Interfaces\ExperienceRepositoryInterface;
use App\Repositories\Interfaces\InterviewRepositoryInterface;
use App\Repositories\Interfaces\MeetingRepositoryInterface;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Repositories\Interfaces\ProjectRepositoryInterface;
use App\Repositories\Interfaces\PurchaseRepositoryInterface;
use App\Repositories\Interfaces\RecruitmentDemandRepositoryInterface;
use App\Repositories\Interfaces\SaleRepositoryInterface;
use App\Repositories\Interfaces\TaskRepositoryInterface;
use App\Repositories\Interfaces\TasksListRepositoryInterface;
use App\Repositories\Interfaces\TrainingRepositoryInterface;
use App\Repositories\Interfaces\VacationRepositoryInterface;
use App\Repositories\InterviewRepository;
use App\Repositories\MeetingRepository;
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
use App\Repositories\TaskRepository;
use App\Repositories\TasksListRepository;
use App\Repositories\TrainingRepository;
use App\Repositories\VacationRepository;
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
        $this->app->bind(TaskRepositoryInterface::class, TaskRepository::class);
        $this->app->bind(CalendarRepositoryInterface::class, CalendarRepository::class);
        $this->app->bind(VacationRepositoryInterface::class, VacationRepository::class);
        $this->app->bind(ClientAppointmentRepositoryInterface::class, ClientAppointmentRepository::class);
        $this->app->bind(InterviewRepositoryInterface::class, InterviewRepository::class);
        $this->app->bind(MeetingRepositoryInterface::class, MeetingRepository::class);
        $this->app->bind(AppointmentRepositoryInterface::class, AppointmentRepository::class);
        $this->app->bind(TasksListRepositoryInterface::class, TasksListRepository::class);
        $this->app->bind(ExperienceRepositoryInterface::class, ExperienceRepository::class);
        $this->app->bind(TrainingRepositoryInterface::class, TrainingRepository::class);
    }


    public function boot()
    {

    }
}
