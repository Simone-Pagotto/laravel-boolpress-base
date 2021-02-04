@extends('layouts.main')

@section('content')
    <form action=" {{ route('posts.update',$post['id']) }} " method="POST" >
        @csrf
        @method('PUT')
        <label for="">Titolo : </label>
        <input type="text" name="title_in" value="{{$post->title}}">
        <label for="">Autore : </label>
        <input type="text" name="author_in" value="{{$post->author}}">
        <label for="">Categoria : </label>
        <select name="category_in" id="">
            <option value="">---</option>
            @foreach($categories as $category)
                <option {{ $post->category->id == $category->id ? 'selected' : ''}}
                        value="{{$category->id}}">{{$category->title}}</option>
            @endforeach
        </select>
        <label for="">Descrizione : </label>
        <input type="text" name="description_in" value="{{$post->postInformation->description}}">

        <button type="submit">Aggiorna Post</button>

    </form>

@endsection