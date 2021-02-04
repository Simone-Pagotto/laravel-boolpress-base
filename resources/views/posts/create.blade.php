@extends('layouts.main')

@section('content')

    <form action=" {{ route('posts.store') }} " method="POST" >
        @csrf
        <label for="">Titolo : </label>
        <input type="text" name="title_in">
        <label for="">Autore : </label>
        <input type="text" name="author_in">
        <label for="">Categoria : </label>
        <select name="category_in" id="">
            <option value="">---</option>
            @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->title}}</option>
            @endforeach
        </select>
        <label for="">Descrizione : </label>
        <input type="text" name="description_in">

        <button type="submit">Crea Post</button>

    </form>

@endsection