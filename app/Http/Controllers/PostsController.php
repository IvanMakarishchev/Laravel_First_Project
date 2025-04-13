<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Laravel\Pail\ValueObjects\Origin\Console;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::where('is_published', 1);
        foreach ($posts as $post) {
            dump($post->title);
        }
    }

    public function create()
    {
        $postsArray = [
            [
                'title' => 'title of the post',
                'content' => 'new post content',
                'image' => 'someimage.jpg',
                'likes' => '15',
                'is_published' => '1',
            ],
            [
                'title' => 'title of the another post',
                'content' => 'another post content',
                'image' => 'onemoreimage.jpg',
                'likes' => '23',
                'is_published' => '1',
            ]
        ];

        foreach ($postsArray as $post) {
            Post::create($post);
        }
    }
}
