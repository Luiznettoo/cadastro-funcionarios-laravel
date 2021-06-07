<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Http\Requests\EmployeeRequest;
use App\Services\EmployeeService;

class EmployeeController extends Controller
{
    private $employee;
    private $employeeService;

    public function __construct()
    {
        $this->employee = new Employee();
        $this->employeeService = new EmployeeService();
    }

    public function index()
    {
        $employees = Employee::paginate(5);

        return view('index', compact('employees'));
    }

    public function create()
    {
        $employees = Employee::all();

        return view('create', compact('employees'));
    }

    public function store(EmployeeRequest $request)
    {
        $this->employeeService->create($request->all());

        return redirect('employees');
    }

    public function show($id)
    {
        $employee = Employee::find($id);

        return view('show', compact('employee'));
    }

    public function edit($id)
    {
        $employee = Employee::find($id);

        return view('create', compact('employee'));
    }

    public function update(EmployeeRequest $request, $id)
    {
        $this->employeeService->update($request->all(), $id);

        return redirect('employees');
    }

    public function destroy($id)
    {
        $del = Employee::destroy($id);
        
        return($del)?"sim":"não";
    }

}