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
}
