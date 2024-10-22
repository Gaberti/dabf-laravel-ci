<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;



class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_that_true_is_true(): void
    {
        $this->assertTrue(true);
    }

    public function test_create_user(): void
    {
        $user = User::create([
            'name' => 'test123',
            'email' => 'test123@mail.com'
        ]);

        $this->assertNotNull($user->name);

        $this->assertEquals('test123', $user->name);
    }

    public function test_exists_user(): void
    {
        User::create([
            'name' => 'test1234',
            'email' => 'test1234@mail.com'
        ]);

        $this->assertDatabaseHas('users', [
            'email' => 'test1234@mail.com',
            'name' => 'test1234',
        ]);
    }

    public function test_user_name_update()
    {
        $user = User::create([
            'name' => 'user-test',
            'email' => 'user@mail.com',
            'password' => bcrypt('pass123'),
        ]);

        $user->name = 'updt-user';
        $user->save();

        $this->assertEquals('updt-user', $user->name);
    }
}
