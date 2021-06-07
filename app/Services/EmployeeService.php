<?php  

namespace App\Services;
use App\Models\Employee;

class EmployeeService 
{
    public function create(array $data)
    {
        return Employee::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'office' => $data['office'],
            'address' => $data['address'],
         ]);
    }

    public function update(array $data, int $id)
    {
        $employee = Employee::find($id);

        $employee->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'office' => $data['office'],
            'address' => $data['address'],
        ]);

        return $employee;
    }
}