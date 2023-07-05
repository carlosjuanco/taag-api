<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Models\Role;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::where('name', 'Administrador')->get()->first();

        $user = new User();
        $user->name = 'juan';
        $user->last_name = 'rojas';
        $user->second_last_name = 'rojas';
        $user->username = 'juancho';
        $user->password = Hash::make('password');
        $user->role_id = $role->id;
        $user->save();
    }
}
