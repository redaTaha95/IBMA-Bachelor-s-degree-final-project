<?php


namespace App\Repositories\Interfaces;


interface EmailRepositoryInterface
{
    public function getUsers();
    public function sendEmail($data);
    public function attachUsersToEmail($email, $employees);
    public function getReceivedEmailsOfAuthenticatedUser();
    public function changeEmailStatusAfterBeenRead($id);
    public function getEmailsSentByUser();
    public function getResponsesOfEmail($email_id);
    public function getPreviousRouterName();
}
