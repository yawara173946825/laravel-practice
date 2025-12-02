<?php

namespace App\Http\Services;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class ArticleService
{
    protected $user;

    public function __construct()
    {
        $this->user = new User();
    }
}
