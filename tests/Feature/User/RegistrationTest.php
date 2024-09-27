<?php

namespace Tests\Feature\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;


    /**
     * @testdox Гость может регистрироваться
     */
    public function test_new_user_can_register()
    {
        $userData = [
            'name' => 'Test User',
            'email' => 'testuser@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ];

        $this->post(route('register'), $userData);

        // Проверка на нового юзера в БД
        $this->assertDatabaseHas('users', [
            'email' => 'testuser@example.com',
        ]);
    }

    /**
     * @testdox Новый пользователь имеет роль 0 (админ) после регистрации
     */
    public function test_new_user_has_default_role()
    {
        $userData = [
            'name' => 'Test User',
            'email' => 'testuser@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ];

        $this->post(route('register'), $userData);

        $this->assertDatabaseHas('users', [
            'email' => 'testuser@example.com',
            'role' => 0, // 0 = админ
        ]);
    }


    /**
     * @testdox Гостя после регистрации редиректит в админку
     */
    public function test_guest_can_register_and_redirect_to_admin_panel()
    {
        $userData = [
            'name' => 'Test User',
            'email' => 'testuser@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ];

        $response = $this->post(route('register'), $userData);

        if (session()->has('errors')) {
            $errors = session('errors')->getBag('default')->getMessages();
            $this->fail('Registration form has errors: ' . json_encode($errors));
        }
        $response->assertRedirect('/admin');

    }

    /**
     * @testdox Новый юзер может видеть админку
     */
    public function test_new_user_can_see_admin_panel ()
    {
        $userData = [
            'name' => 'Test User',
            'email' => 'testuser@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ];

        $response = $this->post(route('register'), $userData);

        if (session()->has('errors')) {
            $errors = session('errors')->getBag('default')->getMessages();
            $this->fail('Registration form has errors: ' . json_encode($errors));
        }

        // Аутентификация пользователя
        $user = \App\Models\User::where('email', 'testuser@example.com')->first();
        $this->actingAs($user);

        // Проверка доступа к /admin
        $response = $this->get('/admin');
        $response->assertStatus(200); // Убедитесь, что страница доступна и возвращает статус 200
    }
}
