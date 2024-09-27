<?php

namespace Post;

use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class PostCreateTest extends TestCase
{
    use RefreshDatabase; // Обновление базы данных перед каждым тестом

    /**
     * @testdox Администратор может создавать посты
     */
    public function test_admin_can_create_post()
    {
        // Создаем админ-пользователя
        $admin = User::factory()->create(['role' => 0]);

        // Создаем категорию
        $category = Category::factory()->create();

        // Аутентифицируемся как админ
        $this->actingAs($admin);

        // Данные для нового поста
        $data = [
            'title' => 'New Post',
            'slug' => 'new-post',
            'content' => 'This is the content of the new post.',
            'category_id' => $category->id,
            'active' => true,
            'preview_image' => UploadedFile::fake()->image('preview.jpg'),
            'main_image' => UploadedFile::fake()->image('main.jpg'),
            'small_description' => 'Описание',
            'additional_tech'=> 'Доп технологии',
            'technology'=> 'Основная технология',
            'gitHub'=> 'empty',
            'queuery'=> '1',
        ];

        $response = $this->post(route('admin.post.store'), $data);

        // Выводим ошибки если есть
        if (session()->has('errors')) {
            dd(session('errors')->getBag('default')->getMessages());
        }

        // Проверка статуса ответа
        $response->assertStatus(302); // Проверяем, что есть редирект (успешное создание)

        // Проверяем, что в сессии нет ошибок валидации
        if ($response->isRedirect()) {
            $response->assertSessionHasNoErrors(); // Если есть ошибки, тест покажет их
        } else {
            // Если не было редиректа, выводим ответ для диагностики
            dd($response->getContent());
        }

        // Убедимся, что пост был создан
        $this->assertDatabaseHas('posts', ['title' => 'New Post']);


        // Проверяем редирект после создания поста
        $response->assertRedirect(route('admin.post.index'));
    }
}
