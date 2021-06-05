<?php

namespace App\Http\Controllers;

use App\Http\Requests\MeetingRequest;
use App\Repositories\Interfaces\MeetingRepositoryInterface;
use Illuminate\Http\Request;

class MeetingController extends Controller
{

    private $meetingRepository;

    public function __construct(MeetingRepositoryInterface $meetingRepository)
    {
        $this->middleware('auth');
        $this->meetingRepository = $meetingRepository;
    }

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(MeetingRequest $request)
    {
        $this->meetingRepository->addMeeting($request->all());
        return redirect()->back();
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(MeetingRequest $request, $id)
    {
        $this->meetingRepository->updateMeeting($request->all(), $id);
        return redirect()->back();
    }

    public function destroy($id)
    {
        $this->meetingRepository->delete($id);
    }
}
