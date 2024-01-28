<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogContent;

class BlogContentsController extends Controller
{
    public function index()
    {
        $blogContents = BlogContent::all();
        return view('blog.index', compact('blogContents'));
    }

    public function create()
    {
        return view('blog.create');
    }

    public function store(Request $request)
    {
        $post = new BlogContent;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->user_id = auth()->id();
        $post->save();
    
        return redirect('/blog.index');
    }
}
