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
        return view('authors.index', [
            'authors' => Author::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('authors.create', [
            'author' => []
        ]);
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

        return $author;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Author $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        return view('authors.show', ['author' => $author]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Author $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        return view('authors.edit', [
            'author' => $author
        ]);
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
        
        return $author;
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

        return 'success';
    }
}
