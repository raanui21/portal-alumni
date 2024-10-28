<?php

namespace Tests\Feature;

use App\Models\User;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UserTest extends TestCase
{
    public function testRegisterSuccess()
    {
        $this->post('/api/users', [
            "email" => "3337210999@ugm.ac.id",
            "password" => "somesecretpassword",
        ])
            ->assertStatus(201)
            ->assertJson([
                "data" => [
                    "email" => "3337210999@ugm.ac.id",
                ]
            ]);
    }
    public function testRegisterFailed()
    {
        $this->post('/api/users', [
            "email" => "",
            "password" => "",
        ])
            ->assertStatus(400)
            ->assertJson([
                "errors" => [
                    "email" => [
                        "The email field is required."
                    ],
                    "password" => [
                        "The password field is required."
                    ]
                ]
            ]);
    }
    public function testRegisterEmailAlreadyExist()
    {
        $this->testRegisterSuccess();

        $this->post('/api/users', [
            "email" => "3337210999@ugm.ac.id",
            "password" => "somesecretpassword",
        ])
            ->assertStatus(400)
            ->assertJson([
                "errors" => [
                    "email" => [
                        "email already registered"
                    ],

                ]
            ]);
    }

    public function testLoginSuccess()
    {
        $this->seed([UserSeeder::class]);

        $this->post('/api/users/login', [
            "email" => "3337210999@ugm.ac.id",
            "password" => "somesecretpassword",
        ])->assertStatus(200)
            ->assertJson(["data" => [
                "email" => "3337210999@ugm.ac.id",
            ]]);

        $user = User::where('email', '3337210999@ugm.ac.id')->first();
        self::assertNotNull($user->token);
    }
    public function testLoginFailedEmailNotFound()
    {
        $this->post('/api/users/login', [
            "email" => "3337210999@ugm.ac.id",
            "password" => "somesecretpassword",
        ])->assertStatus(401)
            ->assertJson([
                "errors" => [
                    "message" => [
                        "wrong email or password"
                    ]
                ]
            ]);
    }

    public function testLoginFailedWrongPassword()
    {
        $this->seed([UserSeeder::class]);

        $this->post('/api/users/login', [
            "email" => "3337210999@ugm.ac.id",
            "password" => "hahahaha",
        ])->assertStatus(401)
            ->assertJson([
                "errors" => [
                    "message" => [
                        "wrong email or password"
                    ]
                ]
            ]);
    }

    public function testGetSuccess()
    {
        $this->seed([UserSeeder::class]);
        $token = 'test';

        $this->get('/api/users/current', [

            'Authorization' => 'Bearer ' . $token
        ])->assertStatus(200)
            ->assertJson([
                'data' => [
                    'email' => '3337210999@ugm.ac.id'
                ]
            ]);
    }
    public function testGetUnauthorized()
    {
        $this->seed([UserSeeder::class]);

        $this->get('/api/users/current')->assertStatus(401)
            ->assertJson([
                'errors' => [
                    'message' => [
                        'unauthorize'
                    ]
                ]
            ]);
    }
    public function testGetInvalidToken()
    {
        $this->seed([UserSeeder::class]);

        $token = 'wrong token';

        $this->get('/api/users/current', [

            'Authorization' => 'Bearer ' . $token
        ])->assertStatus(401)
            ->assertJson([
                'errors' => [
                    'message' => [
                        'unauthorize'
                    ]
                ]
            ]);
    }

    public function testUpdatePasswordSuccess()
    {
        $this->seed([UserSeeder::class]);
        $oldUser = User::where('email', "3337210999@ugm.ac.id")->first();

        // dump("olduser", $oldUser);
        $token = 'test';

        $this->patch(
            '/api/users/current',
            [
                "password" => "newpassword"
            ],
            [

                'Authorization' => 'Bearer ' . $token
            ]
        )->assertStatus(200)
            ->assertJson([
                'data' => [
                    'email' => '3337210999@ugm.ac.id'
                ]
            ]);

        $newUser = User::where('email', "3337210999@ugm.ac.id")->first();
        // dump("newuser", $newUser);

        self::assertTrue(Hash::check('somesecretpassword', $oldUser->password));
        self::assertTrue(Hash::check('newpassword', $newUser->password));

        self::assertNotEquals($oldUser->password, $newUser->password);
    }

    public function logoutSuccess()
    {
        $this->seed([UserSeeder::class]);
        $token = 'test';

        $this->delete(uri: '/api/users/logout', headers: [
            'Authorization' => 'Bearer ' . $token
        ])->assertStatus(200)
            ->assertJson([
                "data" => true
            ]);

        $user = User::where("email", "3337210999@ugm.ac.id")->first();

        self::assertNull($user->token);
    }

    public function logoutFailed()
    {
        $this->seed([UserSeeder::class]);
        $token = 'test';

        $this->delete(uri: '/api/users/logout', headers: [
            'Authorization' => 'Bearer ' . $token
        ])->assertStatus(401)
            ->assertJson([
                "errors" => [
                    "message" => [
                        "unauthorize"
                    ]
                ]
            ]);
    }
}
