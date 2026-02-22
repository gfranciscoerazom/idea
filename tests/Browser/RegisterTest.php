<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;

test('register a user', function () {
    visit('/register')
        ->fill('name', 'John Doe')
        ->fill('email', 'john@example.com')
        ->fill('password', 'password123!@#')
        ->click('Create Account')
        ->assertPathIs('/');

    $this->assertAuthenticated();

    // $this->assertDatabaseHas('users', [
    //     'name' => 'John Doe',
    //     'email' => 'john@example.com',
    // ]);

    expect(Auth::user())->toMatchArray([
        'name' => 'John Doe',
        'email' => 'john@example.com',
    ]);
});

test('log in a user', function () {
    $user = User::factory()->create([
        'password' => 'password123!@#',
    ]);

    visit('/login')
        ->fill('email', $user->email)
        ->fill('password', 'password123!@#')
        ->click('@login-button')
        ->assertPathIs('/');

    $this->assertAuthenticated();
});

test('log out a user', function () {
    $user = User::factory()->create();

    // Auth::login($user);
    $this->actingAs($user);

    visit('/')
        ->click('Log Out');

    $this->assertGuest();
});

test('register a valid email', function () {
    visit('/register')
        ->fill('name', 'John Doe')
        ->fill('email', 'john123')
        ->fill('password', 'password123!@#')
        ->click('Create Account')
        ->assertPathIs('/register');
});
