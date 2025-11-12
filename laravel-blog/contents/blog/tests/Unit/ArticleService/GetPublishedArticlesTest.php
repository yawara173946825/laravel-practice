<?php

namespace Tests\Unit\ArticleService;

use Illuminate\Database\Eloquent\Collection;
use App\Http\Services\ArticleService;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\User;
use App\Models\Article;


class GetPublishedArticlesTest extends TestCase
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
    public function test_記事の全件取得テスト(): void
    {
        // 記事のテストデータ作成
        Article::factory(2)->create();

        $result = $this->article_service->getPublishedArticles();

        $this->assertCount(2, $result);
    }
}
