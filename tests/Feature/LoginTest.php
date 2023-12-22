<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class LoginTest extends TestCase
{
    use RefreshDatabase;
    public function testRegisteredUserCanLogin(): void
    {
        $this -> seed();
        $newUser = User::create([
            'name' => 'Eva',
            'email' => 'test@test.dk',
            'password' => 'test'
        ]);

        $response = $this->post('/login',[
            'email' => $newUser->email,
            'password' => $newUser->password
        ])->assertRedirect('/');

        $this->assertDatabaseHas('users', [
            'email' => $newUser->email,
        ]);
        
        // Asserting status 302 insted of 200 as this is what is given with redirection
        $response->assertStatus(302);
    }

    public function testUnregisteredUserCanNotLogin(): void {
        $this->seed();

        $response = $this->get('/login');
        $response->assertStatus(200);

        $response = $this->followingRedirects()
            ->post('/login',[
                'email' => 'wrong@wrong.dk',
                'password' => 'wrongPassword'
            ]);
        $response->assertStatus(200);
        $response->assertSee('These credentials do not match our records.');
        
    }

    public function testLoginPageCanBeRendered():void {
        $response = $this->get('/login');
        $response->assertStatus(200);
    }

    public function testResisteredUserCanNotLoginWithWrongPassword():void {
        $this -> seed();
        $response = $this->get('/login');

        $newUser = User::create([
            'name' => 'Eva',
            'email' => 'test@test.dk',
            'password' => 'test'
        ]);

        $response = $this->followingRedirects()
            ->post('/login',[
                'email' => $newUser->email,
                'password' => 'wrongPassword'
            ]);

        $response->assertSeeText('These credentials do not match our records.');
        $response->assertStatus(200);
    }
}
