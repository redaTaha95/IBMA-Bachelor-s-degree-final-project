<?php


namespace App\Repositories;


use App\Models\Meeting;

class MeetingRepository extends BaseRepository implements Interfaces\MeetingRepositoryInterface
{
    public function __construct(Meeting $model)
    {
        parent::__construct($model);
    }


    public function addMeeting($data)
    {
        $meeting = $this->create([
            'description' => $data['description'],
            'start_datetime' => $data['start_datetime'],
        ]);

        $this->attachEmployeesToMeeting($meeting, $data['employee_id']);
    }

    public function attachEmployeesToMeeting($meeting, $employees)
    {
        $meeting->employees()->attach($employees);
    }

    public function updateMeeting($data, $id)
    {
        $this->update([
            'description' => $data['description'],
            'start_datetime' => $data['start_datetime'],
        ], $id);
        $meeting = $this->find($id);
        $this->syncEmployeesToMeeting($meeting, $data['employee_id']);
    }

    public function syncEmployeesToMeeting($meeting, $employees)
    {
        $meeting->employees()->sync($employees);
    }

    public function delete($id)
    {
        $this->find($id)->employees()->detach();
        return parent::delete($id);
    }
}
