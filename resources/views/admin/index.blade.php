@extends('layouts.admin')

@section('content')
    <div class="pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $title }}</h1>
    </div>

    <x-alert type="success" :message="$message"/>
    <x-alert type="warning" message="Это сообщение с дополнительными атрибутами" class="d-inline-block"/>
@endsection
