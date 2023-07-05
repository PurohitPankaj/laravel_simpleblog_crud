<?php

namespace App\Http\Controllers;

use App\Models\Post;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'DESC')->paginate(8);
        return view('website.index', compact('posts'));
    }

    public function post($slug)
    {
        //check slug of title and proceed - If not found then redirect to home page
        $post = Post::with('user')->where('slug', $slug)->first();
        if ($post) {
            return view('website.post', compact(['post']));
        } else {
            return redirect('/');
        }
    }
}
