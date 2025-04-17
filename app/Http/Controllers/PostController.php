<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create(){
        $post=new post();
        $post->post='Admin';
        $post->save();
}
}
