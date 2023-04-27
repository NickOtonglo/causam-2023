<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = str_replace(array('.',''), '',strtoupper($this->faker->lexify('???')));
        $slug = Str::slug($title, '-');
        $userID = User::pluck('id');
        // Storage::makeDirectory('public/images/articles/'.Str::slug($title, '-'));

        return [
            'title' => $title,
            'slug' => $slug,
            'preview' => $this->faker->text(150),
            'content' => $this->faker->paragraph(2, true),
            'thumbnail' => time().'-'.$slug.'.jpg',
            'user_id' => $userID->random(),
            // 'picture' => $this->faker->image(public_path('images/articles/'.Str::slug($title, '-')),640,480, null, false)
        ];
    }
}
