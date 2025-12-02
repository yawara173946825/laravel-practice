<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;

    /**
     * ユーザテーブルとのリレーションを定義
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }


    protected $fillable = [
        'title',
        'body',
        'user_id',
        'created_by',
        'updated_by',
    ];

    /**
     * 公開記事全件取得
     *
     * @return \Illuminate\Database\Eloquent\Collection<int, Article>
     */
    public function getPublishedArticles(): Collection
    {
        // TODO: 公開記事フラグを持たせるので検索条件変える
        return Article::all();
    }

    /**
     * ユーザを指定して記事を取得
     *
     * @param int $user_id
     * @return \Illuminate\Database\Eloquent\Collection<int, Article>
     */
    public function getByUserId(int $user_id): Collection
    {
        $query = Article::query();
        $query->where('user_id', $user_id);

        return $query->get();
    }

    /**
     * IDから記事を取得
     *
     * @param int $id
     * @return \App\Models\Article
     */
    public function getById($id): Article
    {
        return Article::find($id);
    }


    /**
     * @param array $data
     * @return \App\Models\Article
     */
    public function articleCreate($data)
    {
        return Article::create($data);
    }

    /**
     * @param int $id
     * @param array $data
     * @return \App\Models\Article
     */
    public function updateArticle(int $id, array $data): Article
    {
        $article = Article::findOrFail($id);
        $article->update($data);
        return $article;
    }
}
