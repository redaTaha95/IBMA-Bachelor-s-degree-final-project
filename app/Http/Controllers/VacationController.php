<?php

namespace App\Http\Controllers;

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

    public function store(Request $request)
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

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
