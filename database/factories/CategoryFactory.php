<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    private static $order = 1;
    protected $model = Category::class;

    public function definition(): array
    {
        $title = $this->faker->sentence(1);

        return [
            'title' => $this->faker->text
        ];
    }
}
