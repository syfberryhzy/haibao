<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class UsersTest extends TestCase
{
    use RefreshDatabase;
    
    /**
     * @test
     */
    public function is_wechat_user_login()
    {
        $response = $this->get('/login/openid/oJqRNt28dmWzq4L_Pyqm9kIhsAdA');

        User::where('openid', 'oJqRNt28dmWzq4L_Pyqm9kIhsAdA')->first();

        $this->assertDatabaseHas('users', ['openid' => 'oJqRNt28dmWzq4L_Pyqm9kIhsAdA']);

        $response->assertStatus(302);

        $response->assertRedirect(route('user.index'));

        $this->get(route('user.index'))->assertSee(auth()->user()->avatar);
    }
}
