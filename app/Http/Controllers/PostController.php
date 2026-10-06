<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index() {
        return view('posts.index');
    }

    public function show(Post $post) {
       return view('posts.show', compact('post'));
    }

    public function create() {
        return view('posts.create');
    }

    public function store(Request $request) {
        $validate = $request->validate([
            'category' => ['required', 'string', 'in:react,vuejs,typescript,css,nodejs,python,sql,architecture,performance'],
            'title' => ['required', 'max:120', 'string'],
            'description' => ['nullable', 'string', 'max:5000'],
            'language' => ['required', 'string', 'in:typescript,javascript,python,sql,css'],
            'code' => ['string', 'nullable', 'max:50000'],
        ]);

        Post::create([
            'user_id' => Auth::user()->id,
            'title' => $validate['title'],
            'content' => $validate['description'],
            'category' => $validate['category'],
            'languageCode' => $validate['language'],
            'code' => $validate['code']
        ]);

        return redirect(route('posts.index'));
    }
}
