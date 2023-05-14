<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artic;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->get()->random(1);
        return view('landing',compact('posts'));
    }

    
}