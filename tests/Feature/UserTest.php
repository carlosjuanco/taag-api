<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Tests\TestCase;

use App\Models\User;

class UserTest extends TestCase
{
    /**
     * Comprobar logueo.
     *
     * @return void
     */

    public function test_verify_logue()
    {
        $response = $this->post('api/check');
        $response->assertStatus(405);
    }
    
    /**
     * Crear un usuario
     *
     * @return void
     */
    public function test_new_user()
    {
        $user = User::where('role_id', 1)->first();

        $response = $this->actingAs($user)->post('api/users', [
            'name' => 'juan', 
            'last_name' => 'rojas', 
            'second_last_name' => 'garcia', 
            'username' => Str::random(10), 
            'role_id' => 1 
        ]);
        $response->assertStatus(200)
        ->assertJson(['message' => 'Usuario creado correctamente']);
        $this->post('api/logout');
    }

    /**
     * Comprobar que el nombre juancho de usuario sea unico
     *
     * @return void
     */
    public function test_verify_name_user_unique()
    {
        $user = User::where('role_id', 1)->first();

        $response = $this->actingAs($user)->post('api/users', [
            'name' => 'juan', 
            'last_name' => 'rojas', 
            'second_last_name' => 'garcia', 
            'username' => 'juancho', 
            'role_id' => 1 
        ]);
        $response->assertStatus(302)
        ->assertSessionHasErrors(['username' => 'El campo usuario ya ha sido registrado.']);
        $this->post('api/logout');
    }
}
