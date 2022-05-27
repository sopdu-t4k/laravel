@extends('layouts.admin')

@section('content')
    <div class="pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $title }}</h1>
    </div>

    <div class="mb-5">
        @include('inc.messages')

        <form method="post" action="{{ route('admin.categories.update', ['category' => $category]) }}">
            @csrf
            @method('put')

            <div class="mb-3">
                <label class="form-label">Наименование категории</label>
                <input type="text" name="title" class="form-control" value="{{ $category->title }}">
            </div>
            <div class="mb-5">
                <label class="form-label">Описание</label>
                <textarea class="form-control" name="description">{!! $category->description !!}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
    </div>

@endsection
