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
                                @if($source->id == old('source_id')) selected @endif
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
                                @if($category->id == old('category_id')) selected @endif
                                >{{ $category->title }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-5">
                <label class="form-label">Статус</label>
                <select class="form-select" name="status">
                    <option @if(old('status') === 'DRAFT') selected @endif>DRAFT</option>
                    <option @if(old('status') === 'ACTIVE') selected @endif>ACTIVE</option>
                    <option @if(old('status') === 'BLOCKED') selected @endif>BLOCKED</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
    </div>

@endsection
