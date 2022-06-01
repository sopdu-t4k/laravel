@extends('layouts.admin')

@section('content')
    <div class="pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $title }}</h1>
    </div>

    <div class="table-responsive mb-5">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Имя отправителя</th>
                    <th>Сообщение</th>
                    <th>Дата добавления</th>
                    <th>Управление</th>
                </tr>
            </thead>
            @isset($items)
                <tbody>
                    @foreach($items as $review)
                        <tr rel="{{ $review->id }}">
                            <td>{{ $review->id }}</td>
                            <td>{{ $review->name }}</td>
                            <td>{{ $review->message }}</td>
                            <td>{{ $review->created_at->format('d.m.Y H:i') }}</td>
                            <td><a href="{{ route('admin.reviews.delete', ['id' => $review->id]) }}" class="text-danger js-delete">delete</a></td>
                        </tr>
                    @endforeach
                </tbody>
            @endisset
        </table>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/delete.js') }}"></script>
@endpush
