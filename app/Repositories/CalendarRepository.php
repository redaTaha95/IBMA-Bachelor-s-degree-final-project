<?php


namespace App\Repositories;


use App\Models\Appointment;
use App\Models\Candidate;
use App\Models\Client;
use App\Models\ClientAppointment;
use App\Models\Employee;
use App\Models\Interview;
use App\Models\Meeting;
use App\Models\Vacation;

class CalendarRepository implements Interfaces\CalendarRepositoryInterface
{

    public function getEmployees()
    {
        return Employee::all();
    }

    public function getVacations()
    {
        return Vacation::all();
    }

    public function getClients()
    {
        return Client::all();
    }

    public function getClientsAppointments()
    {
        return ClientAppointment::all();
    }

    public function getInterviews()
    {
        return Interview::all();
    }

    public function getCandidates()
    {
        return Candidate::all();
    }

    public function getMeetings()
    {
        return Meeting::all();
    }

    public function getAppointments()
    {
        return Appointment::all();
    }
}
