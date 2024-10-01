<?php

namespace Tests\Feature\User;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminPanelAccessTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @testdox Администратор может зайти в админ-панель
     */
    public function test_admin_can_access_admin_page()
    {
        // Создаем админа
        $admin = User::factory()->create(['role' => User::ROLE_ADMIN]);

        // Аутентифицируемся как админ
        $this->actingAs($admin);

        // Переходим на страницу для администраторов (например, /admin)
        $response = $this->get(route('admin.main.index'));

        // Проверяем, что ответ успешный (200)
        $response->assertStatus(200);

    }

    /**
     * @test
     * @testdox Обычный пользователь получает 404 при попытке зайти на страницу админ-панели
     */
    public function test_non_admin_gets_404_on_admin_page()
    {
        // Создаем обычного пользователя
        $user = User::factory()->create(['role' =>  User::ROLE_READER]);

        // Аутентифицируемся как обычный пользователь
        $this->actingAs($user);

        // Переходим на страницу для администраторов
        $response = $this->get(route('admin.main.index'));

        // Проверяем, что для обычного пользователя возвращается 404 или другая ошибка (например, 403)
        $response->assertStatus(404); // Или $response->assertStatus(403), в зависимости от логики доступа
    }
}
