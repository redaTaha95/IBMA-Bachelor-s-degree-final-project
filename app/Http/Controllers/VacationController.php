<?php

namespace App\Http\Controllers;

use App\Http\Requests\VacationRequest;
use App\Repositories\Interfaces\VacationRepositoryInterface;
use Illuminate\Http\Request;

class VacationController extends Controller
{

    private $vacationRepository;

    public function __construct(VacationRepositoryInterface $vacationRepository)
    {
        $this->vacationRepository = $vacationRepository;
    }

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(VacationRequest $request)
    {
        $this->vacationRepository->create($request->all());
        return redirect('/calendar');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(VacationRequest $request, $id)
    {
        $this->vacationRepository->update($request->all(), $id);
        return redirect()->back();
    }

    public function destroy($id)
    {
        $this->vacationRepository->delete($id);
    }
}
