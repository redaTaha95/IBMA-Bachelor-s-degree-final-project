<?php


namespace App\Http\Controllers;


use App\Http\Requests\EmployeeRequest;
use App\Repositories\Interfaces\EmployeeRepositoryInterface;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    private $employeeRepository;
    private $userRepository;
    private $projectRepository;

    public function __construct(EmployeeRepositoryInterface $employeeRepository,UserRepository $userRepository)
    {
        $this->middleware('auth');
        $this->employeeRepository = $employeeRepository;
        $this->userRepository=$userRepository;
    }

    public function index()
    {
        $employees =$this->employeeRepository->all();
        return view('hr.employees.index', compact('employees'));
    }

    public function create()
    {
        $roles = ["Admin","Resource humaine","Chef","Employee"];
        return view('hr.employees.create',compact('roles'));
    }

    public function store(EmployeeRequest $request)
    {
        $request->request->add(['password'=>Hash::make($request['first_name'].'2021')]);
        $this->employeeRepository->addEmployee(
            array_merge(
                $request->except(['role','password']),
                [
                    'user_id' =>
                        $this->userRepository->create(
                            $request->only(['_token','user_id','role','name','email','password'])
                        )->id
                ]
            )
        );
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
        $roles = ["Admin","Resource humaine","Chef","Employee"];
        $roleChecked = $employee->user->role;
        return view('hr.employees.edit', compact('employee','roles','roleChecked'));
    }

    public function update(EmployeeRequest $request, $id)
    {
        //$this->employeeRepository->updateEmployee($request->all(), $id);
        $this->employeeRepository->updateEmployee($request->except(['role']), $id);
        $this->userRepository->update($request->only('first_name','email','role','_token'), $this->employeeRepository->find($id)->user->id);
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
