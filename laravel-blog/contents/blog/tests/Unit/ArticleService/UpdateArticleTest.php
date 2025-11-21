<?php

namespace Tests\Unit\ArticleService;

use App\Http\Services\ArticleService;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\User;
use App\Models\Article;


class UpdateArticleTest extends TestCase
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
    public function test_記事の編集テスト(): void
    {
        $article = Article::factory()->create();

        $input = [
            'title' => '編集テスト',
            'body' => 'これは編集テストです',
        ];

        $result = $this->article_service->updateArticle($article->id, $input);

        // データが登録されているかテスト
        $this->assertDatabaseHas('articles', [
            'user_id' => $this->user->id,
            'title' => $input['title'],
            'body' => $input['body'],
            'created_by' => $result->created_by,
            'updated_by' => $result->updated_by,
        ]);

    }
}
