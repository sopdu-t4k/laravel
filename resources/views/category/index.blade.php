@extends('layouts.main')
@section('title') Категории новостей @parent @stop
@section('content')
    <h1 class="h2">{{ $title }}</h1>

    @isset($items)
        <div class="list-group my-4">
            @foreach($items as $category)
                <a class="list-group-item list-group-item-action" href="{{ route('category.news', $category->id) }}">{{ $category->title }}</a>
            @endforeach
        </div>
    @endisset

@endsection
