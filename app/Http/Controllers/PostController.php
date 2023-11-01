<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function index()
    {

        // return Post::latest()->filter(
        //     request(['search', 'category', 'author'])
        // )->paginate(18);


        return view('posts.index', [
            'posts' => Post::latest()->filter(
                request(['search', 'category', 'author'])
            )->paginate(12)->withQueryString()
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }


    public function create()
    {

        return view('posts.create');
    }


    public function store()
    {


        $attribute = request()->validate([
            'title' => 'required',
            'slug' => ['required',Rule::unique('posts','slug')],
            'thumbnail'=>'required|image',
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);

        $attribute['user_id'] = auth()->id();
        $attribute['thumbnail'] = request()->file('thumbnail')->store('thumbnails');


        Post::create($attribute);

        return redirect('/');

    }
}
