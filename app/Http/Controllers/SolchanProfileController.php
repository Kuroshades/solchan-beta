<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class SolchanProfileController extends Controller
{
    public function show(Request $request, string $name)
    {
        $posts = Post::where('name', $name)->get();

        dd($posts);
    }
}
