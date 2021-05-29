<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receiver extends Model
{
    use HasFactory;

    protected $fillable = array('email_id','receiver_id');

    public function email() {
        return $this->belongsTo(Email::class);
    }

    public function employee() {
        return $this->belongsTo(Employee::class,'receiver_id','id');
    }
}
