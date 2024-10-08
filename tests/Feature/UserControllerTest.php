<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testinhLoginPage()
    {
       $this->get("/login")
       ->assertSeeText("Login");
    }

    public function testLoginSuccess()
    {
        $this->post('/login',[
            "user" => "agil",
            "password" => "rahasia"
        ])->assertRedirect("/")
        ->assertSessionHas("user","agil");
    }

    public function testLoginValidationError()
    {
        $this->post("/login",[])
        ->assertSeeText("User or Password is required");
    }

    public function testLoginFail()
    {
        $this->post("/login",[
            'user' => "tes",
            "password" => "t"
        ])->assertSeeText("user or password wrong");
    }
}
