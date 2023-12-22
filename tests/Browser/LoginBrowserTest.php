<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;

class LoginBrowserTest extends DuskTestCase
{
    use DatabaseMigrations;
    public function setUp():void {
        parent::setUp();

        $this->artisan("migrate");
        $this->artisan("db:seed");
    }
    
    public function testUnregisteredUserCanNotLogIn(): void
    {
        
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->type('email', 'dsf@sdf')
                    ->type('password', 'sdfdffgh')
                    ->press('submit')
                    ->assertSee('These credentials do not match our records.');
        });
    }

    public function testRegisteredUserCanLoginAndIsRedirected(): void {

        $newUser = User::create([
            'name' => 'Eva',
            'email' => 'test@test.dk',
            'password' => 'test'
        ]);

        $this->browse(function ($browser) use ($newUser) {
            $browser->visit('/login')
                    ->type('email', $newUser->email)
                    ->type('password', 'test')
                    ->press('submit')
                    ->waitUntilMissing('submit')
                    ->assertSee('Top movies')
                    ->assertPathIs('/frontpage');
        });
    }
}
