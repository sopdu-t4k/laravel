<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $model = app(News::class);
        $news = $model->getNews();

        return view('news/index', [
            'title' => 'Новости',
            'items' => $news
        ]);
    }

    public function show(int $id)
    {
        $model = app(News::class);
        $news = $model->getNewsById($id);

        return view('news/show', [
            'news' => $news
        ]);
    }
}
