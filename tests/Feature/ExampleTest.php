<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    // public function test_admin_can_create_articles() {
    //     $user = User::factory()->create();

    //     $title = str_replace(array('.',''), '',strtoupper($this->faker->lexify('???')));
    //     $slug = Str::slug($title, '-');
    //     $userID = User::pluck('id');

    //     $article = [
    //         'title' => $title,
    //         'slug' => $slug,
    //         'preview' => $this->faker->text(150),
    //         'content' => $this->faker->paragraph(2, true),
    //         'thumbnail' => time().'-'.$slug.'.jpg',
    //         'user_id' => $userID->random(),
    //     ];

    //     $response = $this->actingAs($user)->json('POST', 'api/articles', $article);
    //     $response->assertStatus(201);
    //     $this->assertDatabaseHas('articles', $article);
    // }
}
