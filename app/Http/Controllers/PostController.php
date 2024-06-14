<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use App\Models\Post;
use App\Models\Price;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::where('parent', 0)
            ->with('pfp', 'tippedTips', 'tipperTips')
            ->paginate(5);

        $posts->each(function ($post) {
            $post->replies = $post->replies()->with('pfp', 'tippedTips', 'tipperTips')
                ->orderBy('id', 'desc')->limit(3)->get();
        });

        return Inertia::render('Posts/Index', ['posts' => $posts]);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $post->load('pfp', 'tippedTips', 'tipperTips', 'replies.pfp', 'replies.tippedTips', 'replies.tipperTips');

        return Inertia::render('Posts/Show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
