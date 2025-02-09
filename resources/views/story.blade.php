@extends('layouts.app')

@push('meta')
    <meta name="description" content="{{ Str::limit($story->content, 130) }}">
    <meta property="og:type" content="article">
    <meta property="og:title" content="{{ $story->title }}">
    <meta property="og:url" content="{{ $story->url }}">
    <meta property="og:description" content="{{ Str::limit($story->content, 130) }}">
@endpush

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <story-card :single="true" :story="{{ json_encode(\App\Http\Resources\StoryResource::make($story)) }}"></story-card>
        </div>
    </div>
</div>
@endsection
