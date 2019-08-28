@extends('template')

@section('content')

<h1>{{ $blog_post->title }}</h1>
<h4>{{ $blog_post->author }}</h4>

<div class="body">
    {{ $blog_post->body }}
</div>

@endsection
