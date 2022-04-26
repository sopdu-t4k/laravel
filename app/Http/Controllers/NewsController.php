<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = $this->getNews();

        return view('news/index', [
            'title' => 'Новости',
            'items' => $news
        ]);
    }

    public function show(int $id)
    {
        $news = [];
        foreach ($this->getNews() as $item) {
            if ($item['id'] == $id) {
                $news = $item;
                break;
            }
        }

        return view('news/show', [
            'news' => $news
        ]);
    }
}
