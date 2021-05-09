<?php


namespace App\Repositories;


use App\Models\Vacation;
use Carbon\Carbon;
use DateTime;

class VacationRepository extends BaseRepository implements Interfaces\VacationRepositoryInterface
{
    public function __construct(Vacation $model)
    {
        parent::__construct($model);
    }


    public function calculateNumberOfVacationDays($start_date, $end_date)
    {
        return Carbon::parse($start_date)->diffInDays(Carbon::parse($end_date));
    }

    public function create(array $data)
    {
        return parent::create([
            'employee_id' => $data['employee_id'],
            'start_date' => $data['start_date'],
            'end_date' => $data['end_date'],
            'number_of_days' => $this->calculateNumberOfVacationDays($data['start_date'], $data['end_date'])
        ]);
    }
}
