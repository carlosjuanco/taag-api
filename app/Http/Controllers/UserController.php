<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class UserController extends Controller
{
    public function __construct () {
        $this->middleware('auth:sanctum');
    }

    public function store (Request $request) {
        $data = $request->validate([
            'name' => ['required'],
            'last_name' => ['required'],
            'second_last_name' => ['nullable'],
            'username' => ['required', 'unique:users'],
            'role_id' => ['required', 'exists:roles,id']
        ]);

        $data['password'] = Hash::make('password');

        User::create($data);

        return response()->json([
            'message' => 'Usuario creado correctamente'
        ], 200);
    }
}
