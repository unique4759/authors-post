<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Author;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = Author::get();

        return response($authors);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response([]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $author = Author::create($request->all());

        return response($author);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Author $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        return response($author);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Author $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        return response($author);
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Author $author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Author $author)
    {
        $author->update($request->all());

        return response($author);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Author $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        $author->delete();

        return response('success');
    }
}
