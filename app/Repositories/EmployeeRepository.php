<?php


namespace App\Repositories;

use App\Exports\EmployeeExport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Employee;

class EmployeeRepository extends BaseRepository implements Interfaces\EmployeeRepositoryInterface
{
    public function __construct(Employee $model)
    {
        parent::__construct($model);
    }

    public function addEmployee($data)
    {
        $employee = $this->create($data);
        $this->storeImage($employee->id, 'image', 'employees', 'employees');
    }

    public function updateEmployee($data, $id)
    {
        $this->update($data, $id);
        $employee = $this->find($id);
        $this->storeImage($employee->id, 'image', 'employees', 'employees');
    }

    public function storeImage($id, $file_name, $folder_name, $table)
    {
        uploadImage($id, $file_name, $folder_name, $table);
    }

    public function exportEmployeesDataAsExcel()
    {
        return Excel::download(new EmployeeExport, 'employees.xlsx');
    }
    public function addUser($data){
        return array_merge($data->only(['email','role']),['password'=> Hash::make($data->first_name .'_'.$data->last_name . '2021'),'name'=>$data->first_name.' '.$data->last_name,'company_id'=>Auth::user()->company->id]);
    }
    public function editUser($data){
        return array_merge($data->only('email','role'),['name'=>$data->first_name .' '.$data->last_name,'password'=>Hash::make($data->first_name.'_'.$data->last_name. '2021')]);
    }

}
