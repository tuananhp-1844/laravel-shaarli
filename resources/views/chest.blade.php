@extends('layouts.app')

@push('meta')
    <meta property="og:type" content="article">
    <meta property="og:title" content="{{ $chest->title }}">
    <meta property="og:url" content="{{ $chest->permalink }}">
@endpush

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <chest-card :single="true" :chest="{{ json_encode(\App\Http\Resources\ChestResource::make($chest)) }}"></chest-card>
        </div>
    </div>
</div>
@endsection
