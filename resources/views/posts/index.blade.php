@extends('layouts.main')
    <h1>POSTS</h1>
@section('content')
    <button>Crea nuovo Post</button>
    
    <table>
        <thead>
            <tr>
                @foreach($columns as $column)
                    <th>{{$column}}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
                <tr>
                    <th>
                        {{$post->id}}
                    </th>
                    <th>
                        {{$post->title}}
                    </th>
                    <th>
                        {{$post->category->title}}
                    </th>
                    <th>
                        {{$post->postInformation->description}}
                    </th>
                    <th>
                        <a href="">Aggiorna</a>
                    </th>
                    <th>
                        <a href="">Cancella</a>
                    </th>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection