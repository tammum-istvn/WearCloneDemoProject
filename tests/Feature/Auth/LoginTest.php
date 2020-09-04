<?php

namespace Tests\Feature\Auth;

use App\Models\Login;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Http\Controllers\Auth\LoginController;
class LoginTest extends TestCase
{
    use RefreshDatabase;

    /**
     * login form display test
     *
     * @return void
     */
    public function testLoginFormView()
    {
        $response = $this->get(route('login'));

        $response->assertSuccessful();
        $response->assertViewIs('auth.login');
    }


    public function testUserCannotViewLoginPageWhenAuthenticated()
    {
        $login = factory(Login::class)->make();
        $response = $this->actingAs($login)->get(route('login'));
        $response->assertRedirect('/');
    }

    /**
     * User should login when email and password are correct.
     * Authenticated should be true
     */
    public function testUserCanLoginWithCorrectCredential()
    {
        $password = 'boss';
        
        $user = factory(User::class)->create();
        $login = factory(Login::class)->create([
            'password' => bcrypt($password),
            'user_id' => $user->id,
        ]);

        $response = $this->from('/login')->post(route('login'), [
            'email' => $login->email,
            'password' => $password,
        ]);

        $response->assertRedirect('/');
        $this->assertAuthenticated();
    }

    /**
     * User can not login when password is incorrect
     * Guest should be true
     */
    public function testUserCanNotLoginWithIncorrectPassword()
    {
        $user = factory(User::class)->create();
        $login = factory(Login::class)->create([
            'user_id' => $user->id,
            'password' => bcrypt($password = 'boss'),
        ]);

        $response = $this->from(route('login'))->post(route('login'), [
            'email' => $login->email,
            'password'  => 'wrong_pass',
        ]);

        $response->assertRedirect(route('login'));
        $response->assertSessionHasErrors('email');
        $this->assertGuest();
    }
    
    /**
     * User can not login when email is incorrect
     * Guest should be true
     */
    public function testUserCanNotLoginWithIncorrectEmail()
    {
        $user = factory(User::class)->create();
        factory(Login::class)->create([
            'user_id' => $user->id,
            'password' => bcrypt($password = 'boss'),
        ]);

        $response = $this->from(route('login'))->post(route('login'), [
            'email' => 'false@gmail.com',
            'password'  => $password,
        ]);

        $response->assertRedirect(route('login'));
        $response->assertSessionHasErrors('email');
        $this->assertGuest();
    }
}
