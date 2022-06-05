@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{ $post->image }}" class="img-fluid rounded-start" alt="image of {{ $post->title }}">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{{ $post->content }}</p>
                        <p class="card-text">
                            <small class="text-muted">{{ $post->getFormatteDate('created_at') }}
                            </small>
                        </p>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">Torna alla lista</a>
            </div>
        </div>
    </div>
@endsection
