@extends('layouts.admin')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $title }}</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="me-2">
                <a href="{{ route('admin.sources.create') }}" class="btn btn-sm btn-outline-secondary">Добавить источник</a>
            </div>
        </div>
    </div>

    @include('inc.messages')

    <div class="table-responsive mb-5">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Наименование</th>
                    <th>Дата добавления</th>
                    <th>Управление</th>
                </tr>
            </thead>
            @isset($items)
                <tbody>
                    @foreach($items as $source)
                        <tr>
                            <td>{{ $source->id }}</td>
                            <td>
                                <a href="{{ $source->url }}" target="_blank">{{ $source->title }}</a>
                            </td>
                            <td>{{ $source->created_at }}</td>
                            <td>
                                <a href="{{ route('admin.sources.edit', ['source' => $source->id]) }}" class="text-success me-2">edit</a>
                                <a href="#" class="text-danger">delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            @endisset
        </table>
    </div>
@endsection
