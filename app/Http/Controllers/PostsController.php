<?php

namespace App\Http\Controllers;

use App\Models\Post;
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
        return view("post.create");
    }

    public function store(Request $data) {
        $data = $data->validate([
            "title"=> "string",
            "content"=> "string",
            "image"=> "string",
        ]);

        Post::create([
            ...$data,
            "likes" => "0",
            "is_published" => "1"
        ]);

        return redirect()->route("post.index");
    }

    public function update()
    {
        $updatedPost = [
            "title" => "new title of the post",
            "content" => "updated post content",
            "image" => "someimage.jpg",
            "likes" => 77,
            "is_published" => 1,
        ];

        Post::where("id", 1)->update($updatedPost);

        dump("post updated");
    }

    public function delete()
    {
        $post = Post::find(2);
        if ($post) {
            $post->delete();
            dump("post deleted");
        } else {
            dump("post already deleted");
        }
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
