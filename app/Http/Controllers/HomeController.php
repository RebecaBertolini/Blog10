<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    public function __construct(private Post $post)
    {
        //facilita para substituicao do model ou seu nome, o laravel recebe o dever de chaamar o servico.
    }

    public function index() {

        $posts = $this->post->where('is_active', true)->latest()->paginate(5);

        return view('dashboard', compact('posts'));
    }

    public function show($post) {


        //select * from posts where slug = ?
        $post = $this->post->where('slug', $post)->firstOrFail();
        //firstOrFail: retorna 404 caso não retorne nada

        //retorna a view onde, o primeiro parametro é a localizacao dessa view, e o segundo é o parametro post que é capturado na URL
        // return view('posts\post', ['post' => $post]);
        return view('posts\post', compact('post'));
    }
}
