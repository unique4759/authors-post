<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Resources\Post as PostResource;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PostResource::collection(Post::all());
    }

      /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post_data = $request->validate([
            'title' => 'required|max:255',
            'text' => 'required',
            'disabled' => 'required'
        ]);
      
        $new_post = Post::create($post_data);
    
        if ($request->input('authors')) {
            $new_post->authors()->attach($request->input('authors'));
        }

        return new PostResource($new_post);
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
        
        return new PostResource($post);
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

        return new PostResource($post);
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

        return PostResource::collection(Post::all());
    }
}
