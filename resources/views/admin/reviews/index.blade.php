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
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
@endsection
