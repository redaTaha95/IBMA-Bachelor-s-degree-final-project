<?php

namespace App\Http\Controllers;

use App\Http\Requests\AppointmentRequest;
use App\Repositories\Interfaces\AppointmentRepositoryInterface;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{

    private $appointmentRepository;

    public function __construct(AppointmentRepositoryInterface $appointmentRepository)
    {
        $this->middleware('auth');
        $this->appointmentRepository = $appointmentRepository;
    }

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(AppointmentRequest $request)
    {
        $this->appointmentRepository->create($request->all());
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

    public function update(AppointmentRequest $request, $id)
    {
        $this->appointmentRepository->update($request->all(), $id);
        return redirect()->back();
    }

    public function destroy($id)
    {
        $this->appointmentRepository->delete($id);
    }
}
