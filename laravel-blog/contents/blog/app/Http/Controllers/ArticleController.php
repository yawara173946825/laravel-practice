<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Services\ArticleService;

class ArticleController extends Controller
{
    protected $article_service;

    public function __construct()
    {
        $this->article_service = new ArticleService();
    }

    // 記事一覧
    public function index()
    {
        $articles = $this->article_service->getPublishedArticles();

        return view('article.index', compact('articles'));
    }

    // 記事作成ページ
    public function create()
    {
        return view('article.create');
    }

    // 記事新規登録
    public function store(StoreArticleRequest $request)
    {
        $input = $request->validated();

        $this->article_service->articleCreate($input);

        return view('article.store');
    }

    // 記事詳細
    public function show(String $id)
    {
        // 整数型にキャスト
        $article_id = (int)$id;

        $article = $this->article_service->getById($article_id);

        return view('article.show', compact('article'));
    }

    /**
     * 記事編集ページ表示
     * @param string $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(string $id)
    {
        $article_id = (int)$id;
        $article = $this->article_service->getById($article_id);

        return view('article.edit', compact('article'));
    }

    /**
     * 記事編集機能
     *
     * @param StoreArticleRequest $request
     * @param string $id
     * @return \Illuminate\Contracts\View\View
     */
    public function update(StoreArticleRequest $request, String $id)
    {
        $input = $request->validated();

        // 整数型にキャスト
        $article_id = (int)$id;

        // 記事更新
        $article = $this->article_service->updateArticle($article_id, $input);

        return redirect()->route('articles.show', $article_id);
    }
}
