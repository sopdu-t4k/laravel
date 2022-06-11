@extends('layouts.admin')

@section('content')
    <div class="pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $title }}</h1>
    </div>

    <div class="mb-5">
        @include('inc.messages')

        <form method="post" action="{{ route('admin.news.store') }}">
            @csrf

            <div class="mb-3">
                <label class="form-label">Заголовок</label>
                <input type="text" name="title" class="form-control" value="{{ old('title') }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Анонс</label>
                <textarea class="form-control" name="preview">{!! old('preview') !!}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Источник</label>
                <select class="form-select" name="source_id">
                    @foreach($sources as $source)
                        <option value="{{ $source->id }}"
                                @selected($source->id == old('source_id'))
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
                                @selected($category->id == old('category_id'))
                                >{{ $category->title }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-5">
                <label class="form-label">Статус</label>
                <select class="form-select" name="status">
                    <option @selected(old('status') === 'DRAFT')>DRAFT</option>
                    <option @selected(old('status') === 'ACTIVE')>ACTIVE</option>
                    <option @selected(old('status') === 'BLOCKED')>BLOCKED</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
    </div>

@endsection
