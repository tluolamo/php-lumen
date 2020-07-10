<?php

use App\User;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    use DatabaseMigrations;

    public function testGetUser()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user)->json('GET', '/user')->seeJsonEquals([
          'user' => $user
        ]);
    }

    public function testGetUserUnauthorized()
    {
        $this->json('GET', '/user')->seeJsonEquals([
          'error' => 'Unauthorized'
        ]);
    }

    public function testUpdateUser()
    {
        $user = factory(User::class)->create();
        $data = [
          'email' => 'test@unittest.com',
          'password' => 'new password',
          'password_confirmation' => 'new password'
        ];
        $this->actingAs($user)->json('PUT', '/user', $data)->seeJson([
          'id' => $user->id,
          'email' => $data['email']
        ]);
    }


    public function testDeleteUser()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user)->json('DELETE', '/user')->seeJson([
          'message' => 'Deleted'
        ]);
    }
}
