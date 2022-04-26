<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $category = $this->getCategory();

        return view('category/index', [
            'title' => 'Категории новостей',
            'items' => $category
        ]);
    }

    public function list(int $id)
    {
        $category = $this->getCategory()[$id];
        $news = array_filter($this->getNews(), function($item) use ($id) {
            return $item['category_id'] == $id;
        });

        return view('news/index', [
            'title' => $category,
            'items' => $news
        ]);
    }
}
