<?php


namespace App\Repositories;


use App\Models\Email;
use App\Models\Response;

class ResponseRepository extends BaseRepository implements Interfaces\ResponseRepositoryInterface
{
    public function __construct(Response $model)
    {
        parent::__construct($model);
    }

    public function create(array $data)
    {
        return parent::create([
            'email_id' => $data['email_id'],
            'user_id' => Auth()->user()->id,
            'content' => $data['content']
        ]);
    }

    public function updateEmailStatus($email_id)
    {
        $email = Email::find($email_id);
        return $email->update([
            'status' => 0,
        ]);
    }
}
