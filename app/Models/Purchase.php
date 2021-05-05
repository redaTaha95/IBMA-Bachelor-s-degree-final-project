<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Purchase extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = [];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
