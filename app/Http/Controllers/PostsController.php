<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    /**
     * Display a listing of the posts created by logged in user.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $posts = Post::where('user_id', $user_id)->orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.post.dashboard', compact('posts'));
    }

    /**
     * Show the form for creating a new post.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.post.create');
    }

    /**
     * Store a newly created post in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validating Request and Errors will be stored in errors obj used in includes/errors file
        $this->validate($request, [
            'title' => 'required|unique:posts,title|max:60',
            'image' => 'required|image',
            'description' => 'required',
        ]);

        $post = Post::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'image' => 'image.png', //just for temp to avoid sql generation error, new name is stored below
            'user_id' => auth()->user()->id,
            'published_at' => Carbon::now(), //current date/time
        ]);

        if ($request->hasFile('image')) {
            //checking for image and storing at public/posts/images folder
            $image = $request->image;
            $image_new_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('posts/images'), $image_new_name);
            $post->image = $image_new_name; //assigning new name to posts image table
            $post->save();
        }

        Session::flash('success', 'Post created successfully');
        return redirect('account');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $this->validate($request, [
            'title' => "required",
            'image' => 'image',
            'description' => 'required'
        ]);

        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->description = $request->description;


        if ($request->hasFile('image')) {
            $image = $request->image;
            $image_new_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('posts/images'), $image_new_name);
            $post->image = $image_new_name;
        }

        $post->save();
        Session::flash('success', 'Post updated successfully');
        return redirect()->back();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if ($post) {
            //checking and deleting image
            if (file_exists(public_path('posts/images/' . $post->image))) {
                unlink(public_path('posts/images/' . $post->image));
            }
            $post->delete();
            Session::flash('success', 'Post deleted successfully');
        }
        return redirect()->back();
    }
}
