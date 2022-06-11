@extends('layouts.admin')

@section('content')
    <div class="pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $title }}</h1>
    </div>

    <div class="mb-5">
        @include('inc.messages')

        <form method="post" action="{{ route('admin.news.update', ['news' => $news]) }}">
            @csrf
            @method('put')

            <div class="mb-3">
                <label class="form-label">Заголовок</label>
                <input type="text" name="title" class="form-control" value="{{ $news->title }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Анонс</label>
                <textarea class="form-control" name="preview">{!! $news->preview !!}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Источник</label>
                <select class="form-select" name="source_id">
                    @foreach($sources as $source)
                        <option value="{{ $source->id }}"
                                @selected($source->id == $news->source_id)
                                >{{ $source->title }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Категория</label>
                <select class="form-select" name="category_id">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                                @selected($category->id == $news->category_id)
                                >{{ $category->title }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-5">
                <label class="form-label">Статус</label>
                <select class="form-select" name="status">
                    <option @selected($news->status === 'DRAFT')>DRAFT</option>
                    <option @selected($news->status === 'ACTIVE')>ACTIVE</option>
                    <option @selected($news->status === 'BLOCKED')>BLOCKED</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
    </div>

@endsection
