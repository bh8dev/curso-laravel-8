<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePost;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::all();

        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(StoreUpdatePost $request)
    {
        Post::create($request->all());
        return redirect()->route('posts.index');
    }

    public function show(int $id)
    {
        if(!$post = Post::find($id))
        {
            return redirect()->route('posts.index');
        }
        else
        {
            return view('admin.posts.show', compact('post'));
        }
    }

    public function destroy(int $id)
    {
        if(!$post = Post::find($id))
        {
            return redirect()->route('posts.index');
        }
        else
        {
            $post->delete();
            return redirect()
                    ->route('posts.index')
                    ->with('success', 'Post deletado com sucesso!');
        }
    }

}
