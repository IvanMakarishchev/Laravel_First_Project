<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Laravel\Pail\ValueObjects\Origin\Console;

class PostsController extends Controller
{
    public function index() {
        $post = Post::find(1);
        dump($post->title);
        dump($post->content);
        dump($post->image);
        dump($post->likes);
        dump($post->is_published);
    }
}
