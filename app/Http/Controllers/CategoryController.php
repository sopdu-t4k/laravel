<?php

namespace App\Http\Controllers;

use App\Queries\QueryBuilderCategories;
use App\Queries\QueryBuilderNews;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(QueryBuilderCategories $categories)
    {
        return view('category.index', [
            'title' => trans('title.category.index'),
            'items' => $categories->getCategories()
        ]);
    }

    public function list(int $id)
    {
        $category = app(QueryBuilderCategories::class)->getCategory($id);

        $news = app(QueryBuilderNews::class)->getNewsByCategory($id);

        return view('news.index', [
            'title' => $category->title,
            'items' => $news,
            'pagination' => false
        ]);
    }
}
