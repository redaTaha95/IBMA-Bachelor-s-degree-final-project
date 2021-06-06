<?php


namespace App\Repositories;


use App\Models\Email;
use App\Models\Response;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class EmailRepository extends BaseRepository implements Interfaces\EmailRepositoryInterface
{

    public function __construct(Email $model)
    {
        parent::__construct($model);
    }

    public function getUsers()
    {
        return User::where('id', '!=', Auth()->user()->id)->get();
    }

    public function sendEmail($data)
    {
        $email = $this->create([
            'user_id' => Auth()->user()->id,
            'subject' => $data['subject'],
            'content' => $data['content'],
        ]);

        $this->attachUsersToEmail($email, $data['users_id']);
    }

    public function attachUsersToEmail($email, $users)
    {
        $email->receivers()->attach($users);
    }

    public function getReceivedEmailsOfAuthenticatedUser()
    {
        return Auth()->user()->received_emails()->orderBy('created_at', 'DESC')->get();
    }

    public function changeEmailStatusAfterBeenRead($id)
    {
        $this->update([
            'status' => 1
        ], $id);
    }

    public function getEmailsSentByUser()
    {
        return Auth()->user()->emails()->orderBy('created_at', 'DESC')->get();
    }

    public function getResponsesOfEmail($email_id)
    {
        return Response::where('email_id', $email_id)->get();
    }
}
