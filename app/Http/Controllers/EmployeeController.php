<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Employee;

use App\Http\Requests\EmployeeRequest;

class EmployeeController extends Controller
{
    public function __construct () {
        $this->middleware('auth:sanctum');
    }

    public function index ($search = '') {
        return Employee::with('company')->where('name', 'like', "%$search%")
            ->paginate(10);
    }

    public function store (EmployeeRequest $request) {
        $data = $request->validated();

        Employee::create($data);

        return response()->json([
            'message' => 'Empleado creado correctamente'
        ], 200);
    }

    public function update (EmployeeRequest $request, Employee $employee) {
        $data = $request->validated();

        $employee->name = $data['name'];
        $employee->last_name = $data['last_name'];
        $employee->email = $data['email'];
        $employee->phone = $data['phone'];
        $employee->company_id = $data['company_id'];
        $employee->save();

        return response()->json([
            'message' => 'Empleado actualizado correctamente'
        ], 200);
    }

    public function destroy (Employee $employee) {
        $employee->delete();

        return response()->json([
            'message' => 'Empleado dado de baja correctamente'
        ], 200);
    }
}
