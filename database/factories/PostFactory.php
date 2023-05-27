<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str ;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = fake()->sentence;
        $description = fake()->paragraph($nb = 100,$asText = false);
        $stripDescription = strip_tags($description);
        $slug =Str::slug($title,'-');
        $coverImage = '841.jpg';
        $isFeatured = false;
    
        return [
            'title' => $title,
            'description' => $description,
            'strip_description' => $stripDescription,
            'slug' => $slug,
            'cover_image' => $coverImage,
            'is_featured' => $isFeatured,
        ];
    }
}
