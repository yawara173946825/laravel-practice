<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;


    protected $fillable = [
        'title',
        'body',
        'user_id',
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
}
