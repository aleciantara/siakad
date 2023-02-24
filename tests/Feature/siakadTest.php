<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class siakadTest extends TestCase
{
    use RefreshDatabase;
    
    public function test_user_can_register()
    {
        $this->withoutExceptionHandling();

        $this->visit('/register');

    }

    public function test_user_can_login()
    {
        $this->withoutExceptionHandling();

        $this->visit('/login');

        $this->submitForm('Login', [
            'email' => 'admin@gmail.com', 
            'password' => 'admin'
        ]);

        $this->see('Login Failed');

    }
}
