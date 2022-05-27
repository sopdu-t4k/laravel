@extends('layouts.main')
@section('title') Новости @parent @stop
@section('content')
    <h1 class="h2">{{ $title }}</h1>

    <nav class="my-4 small">
        <a href="{{ route('category') }}">&laquo; Назад</a>
    </nav>

    <div class="row mb-5">
        @forelse($items as $news)

            <div class="col-12 col-md-6 col-lg-4 d-flex">
                <div class="card shadow-sm mb-4">
                    <svg class="bg-secondary card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img"></svg>
                    <div class="card-body">
                        <h5 class="card-title">{{ $news->title }}</h5>
                        <p class="card-text">{{ $news->preview }}</p>
                    </div>
                    <div class="d-flex justify-content-between align-items-center m-3">
                        <div class="small">{{ $news->created_at->format('d.m.Y') }}</div>
                        <a href="{{ route('news.show', $news->id) }}" class="btn btn-outline-secondary">Подробнее</a>
                    </div>
                    <div class="card-footer text-muted small">
                        <b>Источник:</b> {{ $news->source }}
                    </div>
                </div>
            </div>

        @empty

            <div class="col-12">
                <p>По вашему запросу ничего не найдено</p>
            </div>

        @endforelse
    </div>

    @if($pagination)
        {{ $items->links() }}
    @endif

@endsection
