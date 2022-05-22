@extends('layouts.admin')

@section('content')
    <div class="pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $title }}</h1>
    </div>

    <div class="mb-5">
        @if($errors->any())
            @foreach($errors->all() as $error)
                <x-alert type="danger" :message="$error"></x-alert>
            @endforeach
        @endif

        <form method="post" action="{{ route('admin.categories.store') }}">
            @csrf

            <div class="mb-5">
                <label class="form-label">Наименование категории</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror">
            </div>
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
    </div>

@endsection
