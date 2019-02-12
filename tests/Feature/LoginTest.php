<?php

namespace Tests\Feature\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     *
     *public function testExample()
     *{
     *    $this->assertTrue(true);
     *} */

     public function testRequiresEmailAndLogin()
     {
         $this->json('POST', 'api/login')
             ->assertStatus(422)
             ->assertJson([
                 'email' => ['The email field is required'],
                 'password' => ['The password field is required.'],
             ]);
     }

     public function testUserLoginssSuccessfully()
     {
         $user = factory(User::class)->create([
             'email' => 'testlogin@user.com',
             'password' => bcrypt('123123'),
         ]);

         $payload = ['email' => 'testlogin@user.com', 'password' => '123123'];

         $this->json('POST', 'api/login', $payload)
             ->assertStatus(200)
             ->assertJsonStructure([
                 'data' => [
                     'id',
                     'name',
                     'email',
                     'created_at',
                     'updated_at',
                     'api_token',
                 ]
             ]);
     }

}
