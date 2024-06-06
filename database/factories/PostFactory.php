<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Category;
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
            'preview_image' => null,
            'main_image' => null,
            'technology' => $technology,
            'additional_tech' => $additional_tech,
            'small_description' =>  $small_description,
            'gitHub' => $gitHub,
            'queuery' => self::$order++

//            'slug' => Str::slug($title, '-'),
//            'preview_image' => $this->faker->imageUrl('public/storage/images', 300, 200),
//            'category_id' => Category::get()->random()->id,
//            'isActive' => true,
        ];
    }


    public function configure()
    {
        return $this->afterCreating(function (Post $post) {
            $tagsIds = Tag::inRandomOrder()->take(rand(2,3))->pluck('id');
            $post->tags()->attach($tagsIds);
        });
    }
}
