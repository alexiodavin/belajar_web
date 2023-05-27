<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;


class LandingController extends Controller
{
    public function index() {
        $posts = Post::paginate(10);
        $post_features=Post::where('is_featured',true)->get();
        return view('landing',compact('posts','post_features'));
    }
}
