<?php

use Tests\TestCase;
use App\Models\User;
use App\Models\Article;

class ArticleTest extends TestCase
{
    public function test_can_create_article()
    {
        $user = User::factory()->create();
        $data = [
            'title' => 'Sample Title',
            'content' => 'Sample Content',
        ];

        $response = $this->actingAs($user)->postJson('/api/articles', $data);
        $response->assertStatus(201);
    }

    public function test_can_get_all_articles()
    {
        $user = User::factory()->create();
        $this->actingAs($user)->getJson('/api/articles')
            ->assertStatus(200);
    }
}
