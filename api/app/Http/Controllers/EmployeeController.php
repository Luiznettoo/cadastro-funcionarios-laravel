<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Http\Requests\EmployeeRequest;
class EmployeeController extends Controller
{
    private $employee;

    public function __construct()
    {
        $this->employee = new Employee();
    }

    public function index()
    {
        $employees = Employee::paginate(5);
        return view('index', compact('employees'));
    }

    public function create()
    {
        $employees = Employee::all();
        return view('create',compact('employees'));
    }

    public function store(EmployeeRequest $request)
    {
        $cad = Employee::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'office'=>$request->office,
            'address'=>$request->address,
         ]);
         if($cad){
             return redirect('employees');
         }
    }

    public function show($id)
    {
        $employee = Employee::find($id);
        return view('show',compact('employee'));
    }

    public function edit($id)
    {
        $employee = Employee::find($id);
        return view('create',compact('employee'));
    }

    public function update(EmployeeRequest $request, $id)
    {
        Employee::where(['id'=>$id])->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'office'=>$request->office,
            'address'=>$request->address,
        ]);
        return redirect('employees');
    }

    public function destroy($id)
    {
        $del = Employee::destroy($id);
        return($del)?"sim":"não";
    }

}