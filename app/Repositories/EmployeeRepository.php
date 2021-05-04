<?php


namespace App\Repositories;

use App\Exports\EmployeeExport;
use App\Models\User;
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
        $this->storeImage($employee->id, 'logo', 'employees', 'employees');
    }

    public function updateEmployee($data, $id)
    {
        $this->update($data, $id);
        $employee = $this->find($id);
        $this->storeImage($employee->id, 'logo', 'employees', 'employees');
    }

    public function storeImage($id, $file_name, $folder_name, $table)
    {
        uploadImage($id, $file_name, $folder_name, $table);
    }

    public function exportEmployeesDataAsExcel()
    {
        return Excel::download(new EmployeeExport, 'employees.xlsx');
    }
    public function createUser($data){
        $name = $data->input('name');
        $pass = $data->input('name').'2021';
        $email = $data->input('email');
        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->password = $pass;
        $user->save();
        $id_user = $user->id;
        //$request->fullUrlWithQuery(['user_id' => $id_user]);
        $data->request->add(['user_id' => $id_user]);
    }
    public function lastUser(){
        return User::all()->last();
    }
}
