<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use Illuminate\Http\Request;

class FeaturesController extends Controller
{
    public function index() {
        $features = Feature::find(1);
        dump($features->title);
        dump($features->content);
        dump($features->image);
    }
}
