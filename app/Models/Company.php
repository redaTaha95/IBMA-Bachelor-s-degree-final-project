<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company
{
    use HasFactory, SoftDeletes;

    public function users(){
        return $this->hasMany(User::class);
    }
}
