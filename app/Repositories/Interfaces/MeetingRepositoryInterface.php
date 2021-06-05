<?php


namespace App\Repositories\Interfaces;


interface MeetingRepositoryInterface
{
    public function addMeeting($data);
    public function attachEmployeesToMeeting($meeting, $employees);
    public function updateMeeting($data, $id);
    public function syncEmployeesToMeeting($meeting, $employees);
}
