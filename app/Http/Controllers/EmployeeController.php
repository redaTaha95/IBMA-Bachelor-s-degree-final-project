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
        $roles = ["Resource humaine","Chef","Employee"];
        return view('hr.employees.create',compact('roles'));
    }


    public function store(EmployeeRequest $request)
    {
        $userRequest = $this->employeeRepository->addUser($request);
        $employeeRequest = array_merge($request->except(['role']),['user_id'=>$this->userRepository->create($userRequest)->id]);
        $this->employeeRepository->addEmployee($employeeRequest);
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
        $roles = ["Resource humaine","Chef","Employee"];
        $roleChecked = $employee->user->role;
        return view('hr.employees.edit', compact('employee','roles','roleChecked'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(['email'=>'unique:employees,email,'.$id]);
        $employeeRequest = $request->except(['role']);
        $userRequest = $this->employeeRepository->editUser($request);
        $this->employeeRepository->updateEmployee($employeeRequest, $id);
        $this->userRepository->update($userRequest, $this->employeeRepository->find($id)->user->id);
        session()->flash('update', 'Employee has been updated');
        return redirect('/employees');
    }

    public function destroy($id)
    {
        if($this->employeeRepository->find($id)->vacations->isEmpty() !=1) {
            return response()->json(['errors'=>'Interdit de supprimer cet employé.']);
        }
        $this->employeeRepository->delete($id);
    }

    public function export(){
        return $this->employeeRepository->exportEmployeesDataAsExcel();
    }
}
