<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use app\Http\Controllers\PostController;

class ArtikelController extends Controller

{
    public function index(Request $request) {
        $post=Post::where('slug',$request->slug)->first();
        Return view('article', compact('post'));
    }

    public function store(){

    }
}
