@extends('layouts.main')
@section('title') О проекте @parent @stop
@section('content')
    <div class="col-xl-8 p-3 pb-md-4 mx-auto text-center mb-5">
        <h1 class="display-4 fw-normal">News Portal</h1>
        <p class="fs-5 text-muted">Quickly build an effective pricing table for your potential customers with this Bootstrap example. It’s built with default Bootstrap components and utilities with little customization.</p>
    </div>

    <div class="row">
        <div class="vol-12 col-lg-6 mb-5" id="reviews">

        </div>
        <div class="vol-12 col-lg-6 mb-5">
            <div class="bg-light p-4">
            <h2 class="h4 mb-4">Оставьте ваш отзыв</h2>
            <form method="post" action="{{ route('admin.reviews.store') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Ваше Имя</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="mb-5">
                    <label class="form-label">Ваше сообщение</label>
                    <textarea class="form-control" name="message" required></textarea>
                </div>
                <button type="submit" class="btn btn-secondary">Отправить</button>
            </form>
            </div>
        </div>
    </div>

@endsection
