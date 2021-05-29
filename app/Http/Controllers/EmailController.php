<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\User;
use App\Models\Email;
use App\Models\Receiver;
use Illuminate\Support\Facades\Auth;

class EmailController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function inbox()
    {
        $messages = Receiver::where('receiver_id','=',Auth::user()->employee->id)->get();
        return view('emails.actions.inbox',compact('messages'));
    }

    public function getEmployeeById(Request $request) {
        $sender = Auth::user()->employee->id;
        $receiver = User::where('email','=',$request->receiver)->get();
        if(count($receiver)>0) {
            $receiver =$receiver[0]->employee->id;
            return array('receiver'=>$receiver,'sender'=>$sender);
        }
        else {
            return response()->json(['error'=>'email dosent exist']);
        }
    }

    public function store(Request $request) {

        $field = array('receiver_id');

        $email = $request->except($field);

        $email_id = Email::create($email)->id;

        $receiver = array_merge($request->only($field),['email_id'=>$email_id]);

        Receiver::create($receiver);

        return redirect('emails/send');
    }

    public function send(){
        return view('emails.actions.send');
    }

    public function read($id){
        $message = Receiver::find($id);
        $email = Email::find($message->email_id);
        $email->status = 1;
        $email->save();
        //update(array('status'=>1));
        return view('emails.actions.read',compact('message'));
    }

}
