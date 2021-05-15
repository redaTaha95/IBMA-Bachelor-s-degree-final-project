<?php


namespace App\Repositories;


use App\Models\ClientAppointment;

class ClientAppointmentRepository extends BaseRepository implements Interfaces\ClientAppointmentRepositoryInterface
{
    public function __construct(ClientAppointment $model)
    {
        parent::__construct($model);
    }
}
