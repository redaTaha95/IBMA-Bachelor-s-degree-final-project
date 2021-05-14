<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientAppointmentRequest;
use App\Repositories\Interfaces\ClientAppointmentRepositoryInterface;

class ClientAppointmentController extends Controller
{

    private $clientAppointmentRepository;

    public function __construct(ClientAppointmentRepositoryInterface $clientAppointmentRepository)
    {

        $this->clientAppointmentRepository = $clientAppointmentRepository;
    }

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(ClientAppointmentRequest $request)
    {
        $this->clientAppointmentRepository->create($request->all());
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

    public function update(ClientAppointmentRequest $request, $id)
    {
        $this->clientAppointmentRepository->update($request->all(), $id);
        return redirect()->back();
    }

    public function destroy($id)
    {
        $this->clientAppointmentRepository->delete($id);
    }
}
