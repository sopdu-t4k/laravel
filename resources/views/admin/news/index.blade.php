@extends('layouts.admin')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $title }}</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="me-2">
                <a href="{{ route('admin.news.create') }}" class="btn btn-sm btn-outline-secondary">Добавить новость</a>
            </div>
        </div>
    </div>

    <div class="table-responsive mb-5">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Наименование</th>
                    <th>Источник</th>
                    <th>Статус</th>
                    <th>Дата добавления</th>
                </tr>
            </thead>
            @isset($items)
                <tbody>
                    @foreach($items as $news)
                        <tr>
                            <td>{{ $news['id'] }}</td>
                            <td>{!! $news['title'] !!}</td>
                            <td>{{ $news['source'] }}</td>
                            <td></td>
                            <td>{{ $news['created_at'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            @endisset
        </table>
    </div>
@endsection