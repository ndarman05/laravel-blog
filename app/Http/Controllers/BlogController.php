<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class BlogController extends Controller
{
    public function index(){
        $categories = Category::with('posts')->orderBy('title', 'asc')->get();
        $posts = Post::with('author')->latestFirst()->paginate(3);
        return view('blog.index', compact('posts', 'categories'));
    }

    public function show(Post $post){
        return view('blog.show', compact('post'));
    }

    public function category($id){
        $categories = Category::with('posts')->orderBy('title', 'asc')->get();
        $posts = Post::with('author')->latestFirst()->where('category_id', $id)->paginate(3);
        return view('blog.index', compact('posts', 'categories'));
    }
}
