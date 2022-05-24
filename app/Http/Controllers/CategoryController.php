<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $model = app(Category::class);
        $category = $model->getCategories();

        return view('category/index', [
            'title' => 'Категории новостей',
            'items' => $category
        ]);
    }

    public function list(int $id)
    {
        $category = app(Category::class)->getCategory($id);

        $news = app(News::class)->getNewsByCategory($id);

        return view('news/index', [
            'title' => $category->title,
            'items' => $news
        ]);
    }
}
