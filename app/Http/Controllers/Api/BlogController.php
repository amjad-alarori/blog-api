<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blog = Blog::all();
        return response()->json([
            'blog' => $blog
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $blog = Blog::create($request->all());

        return response()->json([
            'massage' => 'Blog Saved!',
            'blog' =>$blog
        ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $blog = Blog::where('slug', $slug)->first();

        if (!$blog) {
            return response()->json([
                'message' => 'Blog not found!'
            ], 404);
        }
    
        return response()->json([
            'blog' => $blog
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug)
    {

        $blog = Blog::where('slug', $slug)->first();

        if (!$blog) {
            return response()->json([
                'message' => 'Blog not found!'
            ], 404);
        }

        $blog->update($request->all());

        return response()->json([
            'message' => 'Blog updated!',
            'blog' => $blog
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        $blog = Blog::where('slug', $slug)->first();

        if (!$blog) {
            return response()->json([
                'message' => 'Blog not found!'
            ], 404);
        }

        $blog->delete();

        return response()->json([
            'message' => 'Blog deleted!'
        ], 200);
    }
}
