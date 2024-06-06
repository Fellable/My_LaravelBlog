<?php

namespace Database\Factories;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

class TagFactory extends Factory
{
    private static $order = 1;
    protected $model = Tag::class;

    public function definition(): array
    {
        $title = $this->faker->sentence(1);

        return [
            'title' => $this->faker->text
        ];
    }
}
