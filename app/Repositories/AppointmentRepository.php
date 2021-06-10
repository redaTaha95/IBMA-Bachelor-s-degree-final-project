<?php


namespace App\Repositories;


use App\Models\Appointment;

class AppointmentRepository extends BaseRepository implements Interfaces\AppointmentRepositoryInterface
{
    public function __construct(Appointment $model)
    {
        parent::__construct($model);
    }
}
