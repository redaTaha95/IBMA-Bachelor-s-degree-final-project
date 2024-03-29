<?php


namespace App\Repositories\Interfaces;


interface CalendarRepositoryInterface
{
    public function getEmployees();
    public function getVacations();
    public function getClients();
    public function getClientsAppointments();
    public function getInterviews();
    public function getCandidates();
    public function getMeetings();
    public function getAppointments();
}
