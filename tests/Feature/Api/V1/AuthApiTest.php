<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\PersonalAccessToken;

test('register returns user and bearer token', function () {
    $email = 'api-register-'.uniqid().'@example.com';

    $response = $this->postJson('/api/v1/auth/register', [
        'name' => 'API Tester',
        'email' => $email,
        'password' => 'Password1!x',
        'password_confirmation' => 'Password1!x',
    ]);

    $response->assertCreated()
        ->assertJsonPath('token_type', 'Bearer')
        ->assertJsonPath('user.email', $email)
        ->assertJsonStructure(['user' => ['id', 'name', 'email'], 'token']);

    expect($response->json('token'))->toBeString()->not->toBeEmpty();
});

test('register validates input', function () {
    $this->postJson('/api/v1/auth/register', [
        'name' => '',
        'email' => 'not-an-email',
        'password' => 'short',
    ])->assertUnprocessable();
});

test('login returns token for valid credentials', function () {
    $user = User::factory()->create([
        'email' => 'login-'.uniqid().'@example.com',
        'password' => 'Password1!x',
    ]);

    $this->postJson('/api/v1/auth/login', [
        'email' => $user->email,
        'password' => 'Password1!x',
    ])
        ->assertOk()
        ->assertJsonPath('user.id', $user->id)
        ->assertJsonPath('token_type', 'Bearer');
});

test('login rejects invalid credentials', function () {
    $user = User::factory()->create();

    $this->postJson('/api/v1/auth/login', [
        'email' => $user->email,
        'password' => 'wrong-password',
    ])->assertUnauthorized()
        ->assertJsonPath('message', 'Invalid credentials.');
});

test('logout deletes current token', function () {
    $response = $this->postJson('/api/v1/auth/register', [
        'name' => 'Logout User',
        'email' => 'logout-'.uniqid().'@example.com',
        'password' => 'Password1!x',
        'password_confirmation' => 'Password1!x',
    ]);

    $token = $response->json('token');

    $this->withToken($token)
        ->getJson('/api/v1/user')
        ->assertOk();

    $this->withToken($token)
        ->postJson('/api/v1/auth/logout')
        ->assertOk()
        ->assertJsonPath('message', 'Logged out.');

    expect(PersonalAccessToken::findToken($token))->toBeNull();

    // RequestGuard caches the user across calls in one PHP process; clear it like a new HTTP request would.
    Auth::guard('sanctum')->forgetUser();

    $this->withToken($token)
        ->getJson('/api/v1/user')
        ->assertUnauthorized();
});

test('logout requires authentication', function () {
    $this->postJson('/api/v1/auth/logout')->assertUnauthorized();
});
