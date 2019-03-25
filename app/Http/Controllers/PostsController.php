<?php

namespace App\Http\Controllers;

use App\Posts;
use Illuminate\Http\Request;
use PhpOption\Tests\PhpOptionRepo;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Posts::all();

        return response()->json($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        die('www');//
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $posts = Posts::create($request->all());

        return response()->json([
            'message' => 'Great success! New Post created',
            'task' => $posts
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $posts = Posts::findOrFail($id);
        return response()->json([
            'post' => $posts
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function edit(Posts $posts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $posts = Posts::findOrFail($id);
        $posts->update($request->all());

        if($posts->update($request->all())){
            return response()->json([
                'message' => 'Great success! Post updated',
                'post' => $posts
            ]);
        }else{
            return response()->json([
                'message' => 'Could not update post'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posts = Posts::findOrfail($id);

        if($posts->delete()){
            return response()->json([
                'message' => 'Successfully deleted Post!'
            ]);
        }else{
            return response()->json([
                'message' => 'Could not delete Post!'
            ]);
        }

    }
}
