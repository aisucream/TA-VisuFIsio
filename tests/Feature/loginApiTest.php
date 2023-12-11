<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Tests\TestCase;
use App\Providers\RouteServiceProvider;
use App\Models\User;

class loginApiTest extends TestCase {
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;

    public function test_login_screen_can_be_rendered(): void {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_users_can_authenticate_using_the_login_screen(): void {
        $user = User::create([
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'password' => bcrypt('password'),
            'type' => 'web'
        ]);

        // Lakukan pengujian login
        $response = $this->post(route('login'), [
            'email' => $user->email,
            'password' => 'password',
        ]);

        // Assertion
        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::HOME);
    }

    public function test_users_can_not_authenticate_with_invalid_password(): void
    {
        $user = User::create([
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'password' => bcrypt('password'),
            'type' => 'web'
        ]);

        $this->post('/', [
            'email' => $user->email,
            'password' => 'wrong-password',
        ]);

        $this->assertGuest();
    }

    public function test_users_can_not_authenticate_with_invalid_type(): void
    {
        $user = User::create([
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'password' => bcrypt('password'),
            'type' => 'mobile'
        ]);

        $this->post('/', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $this->assertGuest();
    }

    public function test_users_can_logout(): void
    {
        $user = User::create([
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'password' => bcrypt('password'),
            'type' => 'mobile'
        ]);;

        $response = $this->actingAs($user)->post('logout');

        $this->assertGuest();
        $response->assertRedirect('/');
    }

    public function test_users_can_authenticate_using_the_login_api(): void {
        $user = User::create([
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'password' => bcrypt('password'),
            'type' => 'mobile'
        ]);

        $response = $this->post(route('api.login'), [
            'email' => $user->email,
            'password' => 'password',
        ]);


        $response->assertStatus(200);
    }

    public function test_users_can_not_authenticate_login_api_with_invalid_password(): void {
        $user = User::create([
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'password' => bcrypt('password'),
            'type' => 'mobile'
        ]);


        $response = $this->post(route('api.login'), [
            'email' => $user->email,
            'password' => 'wrong-password',
        ]);

        $response->assertStatus(400);
    }

    public function test_users_can_not_authenticate_login_api_with_invalid_type(): void {
        $user = User::create([
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'password' => bcrypt('password'),
            'type' => 'web'
        ]);


        $response = $this->post(route('api.login'), [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $response->assertStatus(400);
    }
}
