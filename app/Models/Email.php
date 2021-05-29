<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    use HasFactory;

    protected $fillable = array('sender_id','subject','content');

    public function receivers() {
        return $this->hasMany(Receiver::class);
    }
    public function employee() {
        return $this->belongsTo(Employee::class,'sender_id','id');
    }
}
