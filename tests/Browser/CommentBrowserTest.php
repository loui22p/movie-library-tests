<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;

class CommentBrowserTest extends DuskTestCase
{
    use DatabaseMigrations;

    // Use this to override rollback for each test
    // public function runDatabaseMigrations():void {
    //     $this->artisan("migrate");
    // }

    public function setUp():void {
        parent::setUp();

        $this->artisan("migrate");
        $this->artisan("db:seed");
    }

    public function testInsertedCommentIsEmpty(): void
    {
        $newUser = User::create([
            'name' => 'Eva',
            'email' => 'test@test.dk',
            'password' => 'test'
        ]);

        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                    ->visit('/movie/1')
                    ->press('submit')
                    ->waitForDialog()
                    ->assertDialogOpened('Please enter a comment');
        });
    }
}
