<?php

namespace Tests\Unit\ArticleService;

use App\Http\Services\ArticleService;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\User;


class ArticleCreateTest extends TestCase
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
    public function test_記事の登録テスト(): void
    {
        dump(auth()->id());
        $input = [
            'title' => 'テスト',
            'body' => 'これはテストです',
        ];

        $result = $this->article_service->articleCreate($input);

        // データが登録されているかテスト
        $this->assertDatabaseHas('articles', [
            'user_id' => $this->user->id,
            'title' => $result->title,
            'body' => $result->body,
            'created_by' => $result->created_by,
            'updated_by' => $result->updated_by,
        ]);

    }
}
