<?php


namespace App\Repositories;


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
}
