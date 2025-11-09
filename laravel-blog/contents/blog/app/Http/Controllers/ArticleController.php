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

        return view('dashboard');
    }
}
