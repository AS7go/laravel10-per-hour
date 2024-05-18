@extends('layouts.main-layout')

@section('title', $current_category1->title ?? 'My blog')

@section('content')

    <div class="btn-group mb-4" role="group" aria-label="Basic outlined example">
        @foreach ($categories1 as $category)
            <a href="{{ route('getPopstsByCategoryName', $category->slug) }}" class="btn btn-outline-primary">{{$category->title}}</a>
        @endforeach

    </div>
    @foreach ($posts1 as $post)
        <div class="card mb-4">
            <div class="card-header">
                <a href="{{ route('getPopstsByCategoryName', $post->category['slug']) }}">{{ $post->category['title'] }}</a>
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $post->title }}</h5>
                <p class="card-text">{{ $post->description }}</p>
                <a href="#" class="btn btn-primary">Read more</a>
            </div>
        </div>
    @endforeach

    <div class="d-flex justify-content-center">
        {{ $posts1->links('vendor.pagination.bootstrap-4') }} <!-- Отображаем ссылки пагинации -->
    </div>

@endsection
