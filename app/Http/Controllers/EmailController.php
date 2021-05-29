<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmailController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function inbox()
    {
        return view('emails.actions.inbox');
    }

    public function send(){
        return view('emails.actions.send');
    }

    public function read(){
        return view('emails.actions.read');
    }
    /*public function inbox(){
        return view('emails.inbox');
    }*/
}
