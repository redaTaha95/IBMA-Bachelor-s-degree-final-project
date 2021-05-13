<?php


namespace App\Repositories;

use App\Exports\EmployeeExport;
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

}
