@extends('layouts.main')
    <h1>POSTS</h1>
@section('content')
    
    <table>
        <thead>
            <tr>
                @foreach($columns as $column)
                    <th>{{$column}}</th>
                @endforeach
            </tr>
        </thead>
    </table>
@endsection