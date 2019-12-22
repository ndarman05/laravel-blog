<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class BlogController extends Controller
{
    public function index(){
        $posts = Post::with('author')->latestFirst()->paginate(3);
        return view('blog.index', compact('posts', 'categories'));
    }

    public function show(Post $post){
        return view('blog.show', compact('post'));
    }

    public function category(Category $category){
        $posts = $category->posts()
                            ->with('author')
                            ->latestFirst()
                            ->where('category_id', $category->id)
                            ->paginate(3);
        return view('blog.index', compact('posts', 'categories'));
    }
}
