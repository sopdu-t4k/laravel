<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Source;
use App\Models\News;
use App\Queries\QueryBuilderNews;
use App\Http\Requests\News\StoreRequest;
use App\Http\Requests\News\UpdateRequest;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(QueryBuilderNews $news)
    {
        return view('admin.news.index', [
            'title' => trans('title.news.index'),
            'items' => $news->getNews(),
            'pagination' => true
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $sources = Source::all();

        return view('admin.news.create', [
            'title' => trans('title.news.create'),
            'categories' => $categories,
            'sources' => $sources
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $validated = $request->validated();
        $validated['slug'] = \Str::slug($validated['title']);
        $news = News::create($validated);

        if($news) {
            return redirect()->route('admin.news.index')
                    ->with('success', trans('message.admin.default.create.success'));
        }

        return back()->with('error', trans('message.admin.default.create.fail'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  News $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        $categories = Category::all();
        $sources = Source::all();

        return view('admin.news.edit', [
            'title' => trans('title.news.edit'),
            'news' => $news,
            'categories' => $categories,
            'sources' => $sources
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  News $news
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, News $news)
    {
        $validated = $request->validated();
        $validated['slug'] = \Str::slug($validated['title']);
        $news = $news->fill($validated);

        if($news->save()) {
            return redirect()->route('admin.news.index')
                    ->with('success', trans('message.admin.default.update.success'));
        }

        return back()->with('error', trans('message.admin.default.update.fail'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  News $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        try {
            $news->delete();
            return response()->json(['id' => $news->id]);

        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return response()->json('error', 400);
        }
    }
}
