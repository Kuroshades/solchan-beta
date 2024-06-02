<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SolchanProfileController extends Controller
{
    public function show(Request $request, string $name)
    {
        $posts = Post::where('name', $name)
            ->orderBy('timestamp', 'desc')
            ->with(['tippedTips', 'tipperTips', 'pfp'])
            ->get();

        if ($posts->isEmpty()) {
            abort(404);
        }

        return Inertia::render('SolchanProfile/Show', [
            'name' => $name,
            'posts' => $posts,
        ]);
    }
}
