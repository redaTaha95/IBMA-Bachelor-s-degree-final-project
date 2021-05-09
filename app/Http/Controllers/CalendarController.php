<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\CalendarRepositoryInterface;
use Illuminate\Http\Request;

class CalendarController extends Controller
{

    private $calendarRepository;

    public function __construct(CalendarRepositoryInterface $calendarRepository)
    {
        $this->middleware('auth');
        $this->calendarRepository = $calendarRepository;
    }

    public function index()
    {
        $employees = $this->calendarRepository->getEmployees();
        $vacations = $this->calendarRepository->getVacations();
        return view('calendar.calendar', compact('employees', 'vacations'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
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
