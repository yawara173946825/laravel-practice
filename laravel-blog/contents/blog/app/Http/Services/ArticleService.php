<?php

namespace App\Http\Services;

use App\Models\Article;
use Illuminate\Database\Eloquent\Collection;

class ArticleService
{
    protected $article;

    public function __construct()
    {
        $this->article = new Article();
    }

    /**
     * 記事全件取得
     *
     * @return \Illuminate\Database\Eloquent\Collection<int, Article>
     */
    public function getPublishedArticles(): Collection
    {
        return $this->article->getPublishedArticles();
    }

    /**
     * 記事登録
     *
     * @param array $input
     * @return \App\Models\Article
     */
    public function articleCreate(array $input)
    {
        $formatted_data = $this->formatCreateData($input);
        return $this->article->articleCreate($formatted_data);
    }


    /**
     * 記事登録データ作成
     *
     * @param array $input
     * @return array
     */
    private function formatCreateData(array $input)
    {
        return [
            'title' => $input['title'],
            'body' => $input['body'],
            'user_id' => auth()->id(),
            'created_by' => auth()->id(),
        ];
    }

}
