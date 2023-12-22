<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Comment;
use App\Models\User;

class CommentTest extends TestCase
{
    use RefreshDatabase;

    
    public function testNoCommentsOnMoviePage(): void {
        $this -> seed();
        $response = $this->get('/movie/1');
        $response->assertDontSee('this is a new comment');
        $response->assertStatus(200);
    }

    public function testSubmittedCommentAppearOnMoviePage(): void {
        $this -> seed();
        $newUser = User::create([
            'name' => 'Eva',
            'email' => 'test@test.dk',
            'password' => 'test'
        ]);

        $newComment = Comment::create([
            'movieId' => 1,
            'comment' => 'this is a new comment',
            'user' => 1
        ]);

        $response = $this->actingAs($newUser)->get('/movie/1');
        $response->assertSee('this is a new comment');
        $response->assertStatus(200);
        $response = $this->assertDatabaseHas("comments",["comment"=>"this is a new comment"]);
    }

    public function testGuestUserCannotMakeComment():void {
        $this -> seed();
        $response = $this->get('/movie/1');
        $response->assertDontSee('Join the discussion');
        $response->assertDontSee('Join');
        $response->assertStatus(200);
    }
}
