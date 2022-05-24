<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    public function index()
    {
        return view('admin.reviews.index', [
            'title' => 'Отзывы'
        ]);
    }

    public function save(Request $request)
    {
        dump($request->only('name', 'message'));
    }
}
