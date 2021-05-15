<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\CalendarRepositoryInterface;
use Illuminate\Http\Request;

class CalendarController extends Controller
{

    private $calendarRepository;

    public function __construct(CalendarRepositoryInterface $calendarRepository)
    {
        $this->middleware('auth');
        $this->calendarRepository = $calendarRepository;
    }

    public function index()
    {
        $employees = $this->calendarRepository->getEmployees();
        $vacations = $this->calendarRepository->getVacations();
        $clients = $this->calendarRepository->getClients();
        $clientsAppointments = $this->calendarRepository->getClientsAppointments();
        $interviews = $this->calendarRepository->getInterviews();
        $candidates = $this->calendarRepository->getCandidates();
        return view('calendar.calendar',
            compact(
                'employees',
                'vacations',
                'clients',
                'clientsAppointments',
                'interviews',
                'candidates'
            )
        );
    }

}
