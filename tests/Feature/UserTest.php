<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_new_user()
    {
        $response = $this->post('/users', [
            'name' => 'juan', 
            'last_name' => 'rojas', 
            'second_last_name' => 'garcia', 
            'username' => 'juancho', 
            'role_id' => 1 
        ]);
        // dd($response);
        // $response->assertStatus(302)->assertSessionHasErrors(['role_id']);
    }
}
