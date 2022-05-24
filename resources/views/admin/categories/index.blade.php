@extends('layouts.admin')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $title }}</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="me-2">
                <a href="{{ route('admin.categories.create') }}" class="btn btn-sm btn-outline-secondary">Добавить категорию</a>
            </div>
        </div>
    </div>

    <div class="table-responsive mb-5">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Наименование</th>
                    <th>Описание</th>
                    <th>Дата добавления</th>
                    <th>Управление</th>
                </tr>
            </thead>
            @isset($items)
                <tbody>
                    @foreach($items as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->title }}</td>
                            <td>{{ $category->description }}</td>
                            <td>{{ $category->created_at }}</td>
                            <td>
                                <a href="{{ route('admin.categories.edit', ['category' => $category->id]) }}" class="text-success me-2">edit</a>
                                <a href="#" class="text-danger">delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            @endisset
        </table>
    </div>
@endsection
