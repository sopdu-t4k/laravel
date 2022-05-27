<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Source;
use App\Queries\QueryBuilderSources;
use Illuminate\Http\Request;

class SourcesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(QueryBuilderSources $sources)
    {
        return view('admin.sources.index', [
            'title' => 'Источники',
            'items' => $sources->getSources()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sources.create', [
            'title' => 'Добавить источник'
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
        $request->validate([
            'title' => ['required', 'string'],
            'url' => ['required', 'string']
	]);

        $validated = $request->only(['title', 'url']);
        $sourse = new Source($validated);

        if($sourse->save()) {
            return redirect()->route('admin.sources.index')
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
     * @param  Source $source
     * @return \Illuminate\Http\Response
     */
    public function edit(Source $source)
    {
        return view('admin.sources.edit', [
            'title' => 'Редактирование источника',
            'source' => $source
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Source $source
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Source $source)
    {
        $validated = $request->only(['title', 'url']);
        $source = $source->fill($validated);

        if($source->save()) {
            return redirect()->route('admin.sources.index')
                    ->with('success', 'Запись успешно обновлена');
        }

        return back()->with('error', 'Ошибка обновления записи');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Source $source
     * @return \Illuminate\Http\Response
     */
    public function destroy(Source $source)
    {
        //
    }
}
