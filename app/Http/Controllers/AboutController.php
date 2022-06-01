<?php

namespace App\Http\Controllers;

use App\Queries\QueryBuilderReviews;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(QueryBuilderReviews $reviews)
    {
        return view('about', [
            'items' => $reviews->getReviews()
        ]);
    }
}
