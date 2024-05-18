<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('title')->get();
        $posts = Post::paginate(4); 
        // $posts = Post::all(); //вызов всех записей с табл

        return view('pages.index', [
            'posts1' => $posts, //передача ас массива
            'categories1' => $categories,
        ]);
    }

    public function getPopstsByCategory($slug)
    {
        $categories = Category::orderBy('title')->get();
        $current_category = Category::where('slug', $slug)->first();

        return view('pages.index', [
            'posts1' => $current_category->posts()->paginate(2), //передача ас массива с метода posts
            'categories1' => $categories,
            'current_category1'=>$current_category
        ]);
    }
}