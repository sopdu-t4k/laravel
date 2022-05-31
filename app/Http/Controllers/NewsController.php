<?php

namespace App\Http\Controllers;

use App\Queries\QueryBuilderNews;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(QueryBuilderNews $news)
    {
        return view('news/index', [
            'title' => trans('title.news.index'),
            'items' => $news->getNewsPublic(),
            'pagination' => true
        ]);
    }

    public function show(int $id, QueryBuilderNews $news)
    {
        return view('news/show', [
            'news' => $news->getNewsById($id)
        ]);
    }
}
