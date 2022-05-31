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

    @include('inc.messages')

    <div class="table-responsive mb-5">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Наименование</th>
                    <th>Источник</th>
                    <th>Статус</th>
                    <th>Дата добавления</th>
                    <th>Управление</th>
                </tr>
            </thead>
            @isset($items)
                <tbody>
                    @foreach($items as $news)
                        <tr rel="{{ $news->id }}">
                            <td>{{ $news->id }}</td>
                            <td>{{ $news->title }}</td>
                            <td>{{ $news->source }}</td>
                            <td>{{ $news->status }}</td>
                            <td>{{ $news->created_at->format('d.m.Y H:i') }}</td>
                            <td>
                                <a href="{{ route('admin.news.edit', ['news' => $news]) }}" class="text-success me-2">edit</a>
                                <a href="{{ route('admin.news.destroy', ['news' => $news]) }}" class="text-danger js-delete">delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            @endisset
        </table>
    </div>

    {{ $items->links() }}
@endsection

@push('scripts')
    <script src="{{ asset('js/delete.js') }}"></script>
@endpush
