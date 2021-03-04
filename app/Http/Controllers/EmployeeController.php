<?php


namespace App\Http\Controllers;


use App\Http\Requests\EmployeeRequest;
use App\Repositories\Interfaces\EmployeeRepositoryInterface;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    private $employeeRepository;

    public function __construct(EmployeeRepositoryInterface $employeeRepository)
    {
        $this->middleware('auth');
        $this->employeeRepository = $employeeRepository;
    }

    public function index()
    {
        $employees =$this->employeeRepository->all();
        return view('hr.employees.index', compact('employees'));
    }

    public function create()
    {
        return view('hr.employees.create');
    }

    public function store(EmployeeRequest $request)
    {
        $this->employeeRepository->addEmployee($request->all());
        session()->flash('success', 'Employee has been added');
        return redirect('/employees');
    }

    public function show($id)
    {
        $employee = $this->employeeRepository->find($id);
        return view('hr.employees.show', compact('employee'));
    }

    public function edit($id)
    {
        $employee = $this->employeeRepository->find($id);
        return view('hr.employees.edit', compact('employee'));
    }

    public function update(EmployeeRequest $request, $id)
    {
        $this->employeeRepository->updateEmployee($request->all(), $id);
        session()->flash('update', 'Employee has been added');
        return redirect('/employees');
    }

    public function destroy($id)
    {
        $this->employeeRepository->delete($id);
    }
}
