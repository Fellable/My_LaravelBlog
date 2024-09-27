<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Category;
use App\Models\PostImage;
use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    private static $order = 1;
    protected $model = Post::class;

    public function definition(): array
    {
        $title = $this->faker->sentence(3);
        $technology = $this->faker->sentence(1);
        $additional_tech = $this->faker->sentence(1) . '/' . $this->faker->sentence(1). '/' . $this->faker->sentence(1) ;
        $small_description = $this->faker->sentence(15);
        $gitHub = $this->faker->sentence(1);

        return [
            'title' => $title,
            'content' => $this->faker->text,
            'category_id' => Category::all()->random()->id,
            'preview_image' => 'images/Main_for_all_seeder.jpg',
            'main_image' => 'images/Main_for_all_seeder.jpg',
            'technology' => $technology,
            'additional_tech' => $additional_tech,
            'small_description' =>  $small_description,
            'gitHub' => $gitHub,
            'queuery' => self::$order++,
            'slug' => Str::slug($title, '-')
//            'preview_image' => $this->faker->imageUrl('public/storage/images', 300, 200),
        ];
    }


    public function configure()
    {
        return $this->afterCreating(function (Post $post) {
            // Присвоение случайных тегов посту
            $tagsIds = Tag::inRandomOrder()->take(rand(2, 3))->pluck('id');
            $post->tags()->attach($tagsIds);

            // Создание 4-6 связанных изображений для поста
            PostImage::factory()->count(rand(4, 6))->create([
                'post_id' => $post->id,  // Связь с постом
            ]);
        });
    }
}
