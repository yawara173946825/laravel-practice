<?php

namespace Tests\Unit\ArticleService;

use Illuminate\Database\Eloquent\Collection;
use App\Http\Services\ArticleService;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\User;
use App\Models\Article;


class GetByIdTest extends TestCase
{
    use DatabaseTransactions;
    protected $article_service;
    protected User $user;

    protected function setUp():void
    {
        parent::setUp();
        $this->article_service = new ArticleService();

        $this->user = User::factory()->create();
        $this->actingAs($this->user);
    }

    /**
     * A basic unit test example.
     */
    public function test_記事をIDから取得する(): void
    {
        // 記事のテストデータ作成
        $article = Article::factory()->create();

        $result = $this->article_service->getById($article->id);

        $this->assertDatabaseHas('articles', [
            'user_id' => $result->user_id,
            'title' => $result->title,
            'body' => $result->body,
            'created_by' => $result->created_by,
            'updated_by' => $result->updated_by,
        ]);
    }
}
