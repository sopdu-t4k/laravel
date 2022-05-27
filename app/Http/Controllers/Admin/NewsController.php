<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Source;
use App\Models\News;
use App\Queries\QueryBuilderNews;
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
            'title' => 'Новости',
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
            'title' => 'Добавить новость',
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
    public function store(Request $request)
    {
        $validated = $request->except(['_token', 'image']);
        $validated['slug'] = \Str::slug($validated['title']);
        $news = News::create($validated);

        if($news) {
            return redirect()->route('admin.news.index')
                    ->with('success', 'Запись успешно добавлена');
        }

        return back()->with('error', 'Ошибка добавления записи');
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
            'title' => 'Редактирование новости',
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
    public function update(Request $request, News $news)
    {
        $validated = $request->except(['_token', 'image']);
        $validated['slug'] = \Str::slug($validated['title']);
        $news = $news->fill($validated);

        if($news->save()) {
            return redirect()->route('admin.news.index')
                    ->with('success', 'Запись успешно обновлена');
        }

        return back()->with('error', 'Ошибка обновления записи');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  News $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        //
    }
}
