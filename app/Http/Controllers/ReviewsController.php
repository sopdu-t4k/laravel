<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Queries\QueryBuilderReviews;
use Illuminate\Http\Request;
use App\Http\Requests\Reviews\StoreRequest;

class ReviewsController extends Controller
{
    public function index(QueryBuilderReviews $reviews)
    {
        return view('admin.reviews.index', [
            'title' => trans('title.reviews.index'),
            'items' => $reviews->getReviews()
        ]);
    }

    public function save(StoreRequest $request)
    {
        $validated = $request->validated();
        $review = Review::create($validated);

        if($review) {
            $response = [
                'item' => $review,
                'message' => trans('message.public.reviews.create.success')
            ];
            return response()->json($response);
        }
        return response()->json(['message' => trans('message.public.reviews.create.fail')], 400);
    }

    public function delete(int $id)
    {
        try {
            Review::destroy($id);
            return response()->json(['id' => $id]);

        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return response()->json('error', 400);
        }
    }
}
