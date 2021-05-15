<?php

namespace App\Http\Controllers;

use App\Http\Requests\InterviewRequest;
use App\Repositories\Interfaces\InterviewRepositoryInterface;

class InterviewController extends Controller
{

    private $interviewRepository;

    public function __construct(InterviewRepositoryInterface $interviewRepository)
    {
        $this->interviewRepository = $interviewRepository;
    }

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(InterviewRequest $request)
    {
        $this->interviewRepository->create($request->all());
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

    public function update(InterviewRequest $request, $id)
    {
        $this->interviewRepository->update($request->all(), $id);
        return redirect()->back();
    }

    public function destroy($id)
    {
        $this->interviewRepository->delete($id);
    }
}
