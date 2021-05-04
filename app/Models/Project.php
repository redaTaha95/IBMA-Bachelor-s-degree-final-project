<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = [];

     public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function Materials()
    {
        return $this->belongsToMany(Material::class,'material_project');
    }
}
