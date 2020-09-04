<?php

namespace Tests\Feature\Auth;

use App\Models\Login;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    /**
     * A registration form view.
     *
     * @return void
     */
    public function testRegistrationFormView()
    {
        $response = $this->get(route('register'));
        $response->assertStatus(200);
    }

    public function testUserCanNotViewRegisterPageWhenAuthenticated()
    {
        $login = factory(Login::class)->make();
        $response = $this->actingAs($login)->get(route('login'));
        $response->assertRedirect('/');
    }

    public function testInputValidation()
    {
        $response = $this->post('register', []);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['name', 'email', 'password', 'account_type']);
    }

    public function testRegistration()
    {
        $name = $this->faker->name;
        $email = $this->faker->email;
        $password = 'test';
        $accountType = 'shop';

        $response = $this->post('register', [
            'name'          => $name,
            'email'         => $email,
            'password'      => $password,
            'account_type'  => $accountType,
        ]);
        
        $response->assertStatus(302);
        $response->assertSessionHasErrors(['password']);
        $response->assertRedirect('/');
        // $this->assertAuthenticatedAs($response);
        // $this->assertDatabaseHas('logins', [
        //     'email' => $email,
        //     'account_type'  =>$accountType,
        // ]);
        
        $login = Login::where('email', $email)->first();
        dd($login);
        // $this->assertAuthenticated($user);
    }
}
