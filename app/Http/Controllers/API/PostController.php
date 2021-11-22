<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Post::get();

        return response()->json($post);
    }

      /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'text' => 'required',
            'disabled' => 'required'
        ]);
      
        $newPost = new Post([
            'title' => $request->get('title'),
            'text' => $request->get('text'),
            'disabled' => $request->get('disabled')
        ]);
    
        $newPost->save();

        if ($request->input('authors')) {
            $newPost->authors()->attach($request->input('authors'));
        }
      
        return response()->json($newPost);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);

        return response()->json($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        $request->validate([
            'title' => 'required|max:255',
            'text' => 'required',
            'disabled' => 'required'
        ]);

        $post->title = $request->get('title');
        $post->text = $request->get('text');
        $post->disabled = $request->get('disabled');

        $post->save();

        $post->authors()->detach();

        if ($request->input('authors')) {
            $post->authors()->attach($request->input('authors'));
        }

        return response()->json($post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        $post->authors()->detach();

        $post->delete();

        return response()->json($post::all());
    }
}
