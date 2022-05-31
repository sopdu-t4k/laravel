<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Source;
use App\Http\Requests\Source\StoreRequest;
use App\Http\Requests\Source\UpdateRequest;
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
            'title' => trans('title.sources.index'),
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
            'title' => trans('title.sources.create')
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
        $sourse = new Source($validated);

        if($sourse->save()) {
            return redirect()->route('admin.sources.index')
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
     * @param  Source $source
     * @return \Illuminate\Http\Response
     */
    public function edit(Source $source)
    {
        return view('admin.sources.edit', [
            'title' => trans('title.sources.edit'),
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
    public function update(UpdateRequest $request, Source $source)
    {
        $validated = $request->validated();
        $source = $source->fill($validated);

        if($source->save()) {
            return redirect()->route('admin.sources.index')
                    ->with('success', trans('message.admin.default.update.success'));
        }

        return back()->with('error', trans('message.admin.default.update.fail'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Source $source
     * @return \Illuminate\Http\Response
     */
    public function destroy(Source $source)
    {
        try {
            $source->delete();
            return response()->json(['id' => $source->id]);

        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return response()->json('error', 400);
        }
    }
}
