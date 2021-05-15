<?php


namespace App\Repositories;


use App\Models\Client;
use App\Models\ClientAppointment;
use App\Models\Employee;
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
}
