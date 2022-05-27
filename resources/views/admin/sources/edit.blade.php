@extends('layouts.admin')

@section('content')
    <div class="pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $title }}</h1>
    </div>

    <div class="mb-5">
        @include('inc.messages')

        <form method="post" action="{{ route('admin.sources.update', ['source' => $source]) }}">
            @csrf
            @method('put')

            <div class="mb-3">
                <label class="form-label">Наименование источника</label>
                <input type="text" name="title" class="form-control" value="{{ $source->title }}">
            </div>
            <div class="mb-5">
                <label class="form-label">URL адрес</label>
                <input type="text" name="url" class="form-control" value="{{ $source->url }}">
            </div>
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
    </div>

@endsection
