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
     * 記事取得
     *
     * @param int $id
     * @return \App\Models\Article
     */
    public function getById($id)
    {
        return $this->article->getById($id);
    }

    /**
     * 記事登録
     *
     * @param array $input
     * @return \App\Models\Article
     */
    public function articleCreate(array $input)
    {
        $formatted_data = $this->formatCreateData($input, 'create');
        return $this->article->articleCreate($formatted_data);
    }

    /**
     * 記事編集
     *
     * @param int $id
     * @param array input
     * @return \App\Models\Article
     */
    public function updateArticle(int $id, array $input): Article
    {
        $formatted_data = $this->formatCreateData($input, 'update');
        return $this->article->updateArticle($id, $formatted_data);
    }




    /**
     * 記事登録データ作成
     *
     * @param array $input
     * @param string $type
     * @return array
     */
    private function formatCreateData(array $input, string $type): array
    {
        $result = [
            'title' => $input['title'],
            'body' => $input['body'],
            'user_id' => auth()->id(),
        ];

        // 新規登録の場合
        if ($type === 'create') {
            $result['created_by'] = auth()->id();
            return $result;
        }

        // 記事編集の場合
        if ($type === 'update') {
            $result['updated_by'] = auth()->id();
            return $result;
        }

        return $result;
    }

}
