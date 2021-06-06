<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmailRequest;
use App\Repositories\Interfaces\EmailRepositoryInterface;
use Illuminate\Http\Request;

class EmailController extends Controller
{

    private $emailRepository;

    public function __construct(EmailRepositoryInterface $emailRepository)
    {
        $this->emailRepository = $emailRepository;
    }

    public function index()
    {
        $emails = $this->emailRepository->getReceivedEmailsOfAuthenticatedUser();
        return view('emails.inbox', compact('emails'));
    }

    public function create()
    {
        $users = $this->emailRepository->getUsers();
        return view('emails.compose', compact('users'));
    }

    public function store(EmailRequest $request)
    {
        $this->emailRepository->sendEmail($request->all());
        return redirect('/emails');
    }

    public function show($id)
    {
        $this->emailRepository->changeEmailStatusAfterBeenRead($id);
        $email = $this->emailRepository->find($id);
        $responses = $this->emailRepository->getResponsesOfEmail($id);
        return view('emails.read', compact('email', 'responses'));
    }

    public function showEmailsSent()
    {
        $emails = $this->emailRepository->getEmailsSentByUser();
        return view('emails.emails-sent', compact('emails'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
