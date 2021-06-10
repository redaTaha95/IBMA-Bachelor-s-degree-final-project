<?php


namespace App\Repositories;
use App\Models\Company;
use App\Models\User;


class UserRepository  extends BaseRepository implements Interfaces\UserRepositoryInterface
{
    public function __construct(User $user) {
        parent::__construct($user);
    }

    public function lastUser(){
        return User::all()->last();
    }

    public function getCompany(){
        return Company::all();
    }

}
