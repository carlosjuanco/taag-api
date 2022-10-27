<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

use App\Models\Company;

use App\Http\Requests\CompanyRequest;

class CompanyController extends Controller
{
    public function __construct () {
        $this->middleware('auth:sanctum');
    }

    public function index ($search = '') {
        return Company::where('name', 'like', "%$search%")->paginate(10);
    }

    public function store (CompanyRequest $request) {
        $data = $request->validated();

        $data['logo'] = $request->file('logo')->store('public');

        Company::create($data);

        return response()->json([
            'message' => 'Empresa creada correctamente'
        ], 200);
    }

    public function update (CompanyRequest $request, Company $company) {
        $data = $request->validated();

        $company->name = $data['name'];
        $company->email = $data['email'];
        $company->logo = $request->file('logo')->store('public');
        $company->website = $data['website'];
        $company->save();

        return response()->json([
            'message' => 'Empresa actualizada correctamente'
        ], 200);
    }
    
    public function destroy (Company $company) {
        $company->delete();

        return response()->json([
            'message' => 'Empresa dada de baja correctamente'
        ], 200);
    }

    public function getAllCompanies () {
        return Company::get();
    }
}
