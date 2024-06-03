<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tip;
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

        $tips_received = intval(Tip::where('tipped_name', $name)
            ->sum('amount'));

        $tips_given = intval(Tip::where('tipper_name', $name)
            ->sum('amount'));

        if ($posts->isEmpty()) {
            abort(404);
        }

        return Inertia::render('SolchanProfile/Show', [
            'name' => $name,
            'posts' => $posts,
            'tips_received' => $tips_received,
            'tips_given' => $tips_given,
        ]);
    }
}
