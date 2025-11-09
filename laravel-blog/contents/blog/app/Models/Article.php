<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title',
        'body',
        'user_id',
    ];

    /**
     * @param array $data
     * @return \App\Models\Article
     */
    public function articleCreate($data)
    {
        return Article::create($data);
    }
}
