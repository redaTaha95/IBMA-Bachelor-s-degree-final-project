<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function clientAppointmets()
    {
        return $this->hasMany(ClientAppointment::class);
    }
}
