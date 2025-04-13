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
}
