<?php


namespace App\Repositories\Interfaces;


interface VacationRepositoryInterface
{
    public function calculateNumberOfVacationDays($start_date, $end_date);
}
