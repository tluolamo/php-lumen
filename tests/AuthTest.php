<?php

use App\User;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class AuthTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    use DatabaseMigrations;

    public function testRegister()
    {
        $data = [
          'email' => 'unittest@unittest.com',
          'password' => 'unittest',
          'password_confirmation' => 'unittest'
        ];
        $this->json('POST', '/register', $data)->seeJson([
          'message' => 'CREATED',
        ]);

    }

    public function testRegisterFailure()
    {
        // $this->withoutExceptionHandling();
        $user = factory(User::class)->create();
        $data = [
          'email' => $user->email,
          'password' => 'password',
          'password_confirmation' => 'password'
        ];

        //trying with existing data fails
        $this->json('POST', '/register', $data)->seeJsonEquals([
          'email' => ['The email has already been taken.'],
        ]);
    }

    public function testLogin()
    {
        $user = factory(User::class)->create();
        $data = [
          'email' => $user->email,
          'password' => 'password',
        ];
        $this->json('POST', '/login', $data)->seeJson([
          'token_type' => 'bearer',
          'expires_in' => 3600
        ]);
    }

    public function testLoginFailure()
    {
        $user = factory(User::class)->create();
        $data = [
          'email' => $user->email,
          'password' => 'password2',
        ];
        $this->json('POST', '/login', $data)->seeJson([
          'message' => 'Unauthorized',
        ]);
    }
}
