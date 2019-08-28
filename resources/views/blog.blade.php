{{-- blog.blade.php --}}
@extends('template')



@section('content')

    <h1>Šis ir mans blogs</h1>

    @foreach ($myblogs as $item)
        <div class="card">
            <h4>{{ $item->title }}</h4>
            <p>{{ $item->body }}</p>
            <span> {{ $item->created_at->diffForHumans() }} </span>
        </div>
    @endforeach

@endsection

@section('sidebar')

    <ul>
        <li>A</li>
        <li>B</li>
        <li>C</li>
    </ul>

@endsection
