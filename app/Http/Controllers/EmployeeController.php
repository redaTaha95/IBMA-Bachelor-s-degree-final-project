<?php


namespace App\Http\Controllers;


use App\Http\Requests\EmployeeRequest;
use App\Models\User;
use App\Models\Employee;
use App\Repositories\Interfaces\EmployeeRepositoryInterface;
use App\Repositories\EmployeeRepository;
use App\Repositories\UserRepository;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    private $employeeRepository;
    private $userRepository;
    private $projectRepository;

    public function __construct(EmployeeRepositoryInterface $employeeRepository,UserRepositoryInterface $userRepository)
    {
        //$this->middleware('auth');
        $this->employeeRepository = $employeeRepository;
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $employees =$this->employeeRepository->all();
        //$emp = Employee::find(1);
        //return $emp;
        return view('hr.employees.index', compact('employees'));
    }

    public function create()
    {

        return view('hr.employees.create');
    }

    public function store(EmployeeRequest $request)
    {

        //$this->employeeRepository->createUser($request);
        //return $request->only(['name', 'email','_token']);

        $this->userRepository->create($request->only(['name', 'email','_token']));
        //$res = array_merge($request->all(), ['user_id' => $this->employeeRepository->lastUser()->id]);
        //$this->employeeRepository->addEmployee($request->all());
        //$this->employeeRepository->addEmployee($res);
        //session()->flash('success', 'Employee has been added');
        //return redirect('/employees');
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

    public function export(){
        return $this->employeeRepository->exportEmployeesDataAsExcel();
    }
}
