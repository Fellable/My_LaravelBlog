<?php

namespace Database\Factories;

use App\Models\PostImage;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PostImage>
 */
class PostImageFactory extends Factory
{
    protected $model = PostImage::class;
    public function definition(): array
    {
        // Используем случайный файл из 0.jpg, 1.jpg, 2.jpg и т.д.
        $fileIndex = $this->faker->numberBetween(0, 3);
        $filePath = 'images/' . $fileIndex . '.jpg';

        return [
            'file_path' => $filePath,
        ];
    }
}
