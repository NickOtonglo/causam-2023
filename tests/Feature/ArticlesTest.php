<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Article;

class ArticlesTest extends TestCase
{

    use RefreshDatabase;

    public function test_admin_can_create_articles() {
        $user = User::factory()->create();

        $article = Article::factory()->create();

        $response = $this->actingAs($user)->post('api/articles', $article->toArray());
        $response->assertStatus(201);
        // $this->assertDatabaseHas('articles', $article);
    }
}
