@extends('layouts.main')
@section('title') О проекте @parent @stop
@section('content')
    <div class="col-xl-8 p-3 pb-md-4 mx-auto text-center mb-5">
        <h1 class="display-4 fw-normal">News Portal</h1>
        <p class="fs-5 text-muted">Quickly build an effective pricing table for your potential customers with this Bootstrap example. It’s built with default Bootstrap components and utilities with little customization.</p>
    </div>

    <div class="row">
        <div class="vol-12 col-lg-6 mb-5" id="reviews">
            @forelse($items as $review)
                <div class="review">
                    <div class="review-header">
                        {{ $review->created_at->format('d.m.Y H:i') }}
                        <b>{{ $review->name }}</b>
                    </div>
                    <div class="review-body">
                        {{ $review->message }}
                    </div>
                </div>
            @empty
                <p class="text-center text-muted">Отзывов пока нет</p>
            @endforelse
        </div>

        <div class="vol-12 col-lg-6 mb-5">
            <div class="bg-light p-4">
                <h2 class="h4 mb-4">Оставьте ваш отзыв</h2>

                <form id="reviewForm" method="post" action="{{ route('reviews.save') }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Ваше Имя</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="mb-5">
                        <label class="form-label">Ваше сообщение</label>
                        <textarea name="message" class="form-control"></textarea>
                    </div>
                    <button type="submit" class="btn btn-secondary">Отправить</button>
                </form>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script src="{{ asset('js/review.js') }}"></script>
@endpush
