@extends('layouts.main')

@section('content')

    <h1>TAGS</h1>

    <ul>
        @foreach($tags as $tag)
            <li>
                <a href="{{ route('tags.show', $tag) }}">{{$tag->name}}</a>
            </li>
        @endforeach
    </ul>

@endsection