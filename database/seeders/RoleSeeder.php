<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role();
        $role->name = 'Administrador';
        $role->description = 'Descripción';
        $role->save();

        $role = new Role();
        $role->name = 'Usuario normal';
        $role->description = 'Usuarios normales';
        $role->save();
    }
}
