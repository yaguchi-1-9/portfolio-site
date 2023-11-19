<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogPost;

class BlogPostsController extends Controller
{
    public function index()
    {
        $blogPosts = BlogPost::all();
        return view('blog.index', compact('blogPosts'));
    }
}
