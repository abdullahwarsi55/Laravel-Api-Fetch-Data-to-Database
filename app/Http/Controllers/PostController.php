<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Post;


class PostController extends Controller
{
    public function store(){
        $api_url="https://jsonplaceholder.typicode.com/posts";
        $response=Http::get($api_url);
    $data=json_decode($response->body());
    foreach ($data as $item) {
        Post::updateOrCreate([
            'userId' => $item->userId,
            'id' => $item->id,
            'title' => $item->title,
            'body' => $item->body,
            
        ]); 
    }
    dd("data stored");
    }
    public function show(){
        $posts=Post::all()->toArray();
        dd($posts);
    }
}
