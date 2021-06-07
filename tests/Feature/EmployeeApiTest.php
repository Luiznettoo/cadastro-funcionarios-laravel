<?php

namespace Tests\Feature;

use App\Models\Employee;
use App\Services\EmployeeService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EmployeeApiTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_all_employees()
    {
        $response = $this->get('/employees');

        $response
            ->assertStatus(200);
    }

    public function test_store_employee()
    {
       $employeeService = new EmployeeService;
       $data = [
            "name" => "teste Name",
            "email" => "teste Email",
            "office" => "teste Office",
            "address" => "teste Address",
       ];

       $response = $employeeService->create($data);

       $this->assertInstanceOf(Employee::class, $response);
       
       $this->assertEquals('teste Name', $response->name);
       $this->assertEquals('teste Email', $response->email);
       $this->assertEquals('teste Office', $response->office);
       $this->assertEquals('teste Address', $response->address);
    }

    public function test_update_employee()
    {
        $employeeService = new EmployeeService;

        $createData = [
                "name" => "teste Name",
                "email" => "teste Email",
                "office" => "teste Office",
                "address" => "teste Address",
        ];

        $employee = $employeeService->create($createData);

        $updateData = [
                "name" => "teste NameUpdate",
                "email" => "teste EmailUpdate",
                "office" => "teste OfficeUpdate",
                "address" => "teste AddressUpdate",
        ];

        $response = $employeeService->update($updateData, $employee->id);

        $this->assertEquals('teste NameUpdate', $response->name);
        $this->assertEquals('teste EmailUpdate', $response->email);
        $this->assertEquals('teste OfficeUpdate', $response->office);
        $this->assertEquals('teste AddressUpdate', $response->address);
    }
}
