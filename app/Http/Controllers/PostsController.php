<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Laravel\Pail\ValueObjects\Origin\Console;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view("post.index", compact("posts"));
    }

    public function create()
    {
        $categories = Category::all();

        return view("post.create", compact("categories"));
    }

    public function store(Request $data)
    {
        $data = $data->validate([
            "title" => "string",
            "content" => "string",
            "image" => "string",
            "category_id" => "integer"
        ]);

        Post::create([
            ...$data,
            "likes" => "0",
            "is_published" => "1"
        ]);

        return redirect()->route("post.index");
    }

    public function show(Post $post)
    {
        return view("post.show", compact("post"));
    }

    public function edit(Post $post)
    {
        $categories = Category::all();

        return view("post.edit", compact(["post", "categories"]));
    }

    public function update(Post $post, Request $data)
    {
        $data = $data->validate([
            "title" => "string",
            "content" => "string",
            "image" => "string",
            "category_id" => "integer"
        ]);

        $post->update($data);

        return redirect()->route("post.show", $post->id);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route("post.index");
    }

    public function restore()
    {
        $post = Post::withTrashed()->find(2);
        if ($post->deleted_at) {
            $post->restore();
            dump("post restored");
        } else {
            dump("nothing to restore");
        }
    }

    public function firstOrCreate()
    {
        $somePost = [
            "title" => "some another new new post",
            "content" => "some new content",
            "image" => "someimage.jpg",
            "likes" => 34,
            "is_published" => 1
        ];

        $post = Post::firstOrCreate(["title" => $somePost["title"]], $somePost);

        $post->wasRecentlyCreated ? dump("post was created") : dump("post already exists");
    }

    public function updateOrCreate()
    {
        $somePost = [
            "title" => "new 1000% awesome title of the post",
            "content" => "some 1000% new content",
            "image" => "someimage.jpg",
            "likes" => 34,
            "is_published" => 0
        ];

        $post = Post::updateOrCreate(["title" => $somePost["title"]], $somePost);

        if ($post->wasRecentlyCreated) {
            dump("post created");
        } elseif ($post->wasChanged()) {
            dump("post updated");
        } else {
            dump("no changes detected");
        }
    }
}
