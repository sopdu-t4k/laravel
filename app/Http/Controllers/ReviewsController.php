<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Requests\Reviews\StoreRequest;

class ReviewsController extends Controller
{
    public function index()
    {
        return view('admin.reviews.index', [
            'title' => trans('title.reviews.index')
        ]);
    }

    public function save(StoreRequest $request)
    {
        $validated = $request->validated();

        // Как вернуть ошибки валидации формы в формате json?

        return response()->json($validated);
    }
}
