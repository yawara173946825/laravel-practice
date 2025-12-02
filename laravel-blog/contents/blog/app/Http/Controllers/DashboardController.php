<?php

namespace App\Http\Controllers;

use App\Http\Services\ArticleService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    protected $article_service;

    public function __construct()
    {
        $this->article_service = new ArticleService();
    }

    /**
     * マイページ表示
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $user_id = auth()->id();
        $articles = $this->article_service->getByUserId($user_id);
        return view('dashboard.dashboard', compact(['articles']));
    }
}
