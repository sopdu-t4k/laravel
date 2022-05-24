@extends('layouts.main')
@section('title') {{ $news->title }} @stop
@section('content')
    @if($news)

        <nav class="my-4 small">
            <a href="{{ route('category.news', $news->category_id) }}">&laquo; Назад</a>
        </nav>

        <p class="text-muted small">
            Опубликовано: {{ $news->created_at }}
        </p>

        <h1>{!! $news->title !!}</h1>

        <div class="my-5">{!! $news->preview !!}</div>
        <p><b>Источник:</b> {{ $news->source }}</p>

    @else

        <p>По вашему запросу ничего не найдено</p>

    @endif

@endsection
