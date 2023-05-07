<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::paginate(10);
        return view('admin.artikel.index',compact('posts')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $post=$request; 
        $path = $post->cover_image->storeAs('cover_image', $post->cover_image->getClientOriginalName());
        Post::create([
            'title' => $post->title,
            'description' => $post->content,
            'strip_description' => strip_tags($request->content), 
            'cover_image' => $post->cover_image->getClientOriginalName(),
        ]);
        $input = $request->all();

        return redirect('/artikel')->with('success', 'Data berhasil diubah.');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        {

            $posts=Post::all();
            return view('admin.artikel.create',compact('posts')); 
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $post=Post::findOrFail($request->id);
        
        Return view('admin.artikel.edit', compact('post'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $post = Post::find($request->id)->update([
            'title' => $request->title,
            'description' => $request->content, 
            'strip_description' => strip_tags($request->content), 

        ]);
        return redirect('/artikel')->with('success', 'Data berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
   
    {   
        $post = Post::find($request->id);
        Storage::delete('cover_image/' . $post->cover_image);
        $post->delete();
        session()->flash('delete', 'Data berhasil dihapus!');
        return back();
    }

    

} 

