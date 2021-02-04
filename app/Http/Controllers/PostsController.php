<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use App\Post;
use App\PostInformation;
use Illuminate\Support\Str;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $columns = [
            '#','Titolo','Categoria','Descrizione','Tags','Aggiorna','Cancella'
        ];
        $posts = Post::all();

        return view('posts.index', compact('posts','columns'));
        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newPost = new Post();

        $newPostInformation = new PostInformation();

        $newPost->title = $request['title_in'];

        $newPost->author = $request['author_in'];

        $newPost->category_id = $request['category_in'];

        $newPostInformation->description = $request['description_in'];

        $newPostInformation->slug = Str::of($request['title_in'])->slug('-');

        $newPost->save();

        $newPost->postInformation()->save($newPostInformation);//salvataggio relationship

    
        return view('posts.success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        return view('posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();

        return view('posts.edit',compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $updatingPost = Post::find($id);

        $postInformationId = $updatingPost->postInformation->id;

        $updatingPostInformation = PostInformation::find($postInformationId);

        $updatingPost->title = $request['title_in'];

        $updatingPost->author = $request['author_in'];

        $updatingPost->category_id = $request['category_in'];

        $updatingPostInformation->description = $request['description_in'];

        $updatingPostInformation->slug = Str::of($request['title_in'])->slug('-');

        $updatingPost->save();

        $updatingPost->postInformation()->save($updatingPostInformation);//salvataggio relationship

    
        return view('posts.success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->postInformation->delete();

        $post->delete;
        
        return redirect()->route('posts.index');
    }
}
