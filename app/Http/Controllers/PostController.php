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
        $price = Price::orderBy('timestamp', 'desc')->first()->price;
        $posts = Post::where('parent', 0)
            ->withCount(['tippedTips as total_tipped' => function ($query) {
                $query->select(DB::raw('coalesce(sum(amount), 0)'));
            }])
            ->with('latestReply')
            ->withCount('replies')
            ->paginate(7);

        $posts->getCollection()->transform(function ($post) use ($price) {
            $post->total_tipped_USD = round($post->total_tipped * $price, 1);
            $post->thumb_image_link = $post->thumb ? env('ALPHA_URL') . '/thumb/' . $post->thumb : "";
            $post->original_image_link =  $post->thumb ? env('ALPHA_URL') . '/src/' . $post->file : "";
          
            if ($post->latest_reply) {
                $post->latest_reply->thumb_image_link = $post->latest_reply->thumb ? env('ALPHA_URL') . '/thumb/' . $post->latest_reply->thumb : "";
                $post->latest_reply->original_image_link = $post->latest_reply->thumb ? env('ALPHA_URL') . '/src/' . $post->latest_reply->file : "";
            }
            

            $post->nameblock = str_replace('<span class="postername">', '<span class="postername font-bold  underline style="color: #059669 !important;">', $post->nameblock);
            return $post;
        });


        // dd($posts);
        return Inertia::render('Post/Index', ['posts' => $posts]);
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
        return Inertia::render('Post/Show', [
            'post' => $post->load(['replies', 'pfp', 'tippedTips', 'tipperTips']),
        ]);
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
