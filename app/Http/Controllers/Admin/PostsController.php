<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\PostRequest;

class PostsController extends Controller
{
    public function __construct(private Post $post)
    {

    }
    public function index() {

        $posts = $this->post->latest()->paginate(10);

        return view('admin.posts.index', compact('posts'));
    }

    public function create(User $users) {

        $users = $users->all(['id', 'name']);
        return view('admin.posts.create', compact('users'));
    }

    public function store(PostRequest $request, User $user) {


        //Criacao via active record
        //Model representa a tabela do banco

        //cria uma instancia da model, ou seja, das informações do BD
        //indica a coluna do BD dessa model e o que é recebido da request para incluir nela

        // $post = new Post();
        // $post->title = $request->title;
        // $post->description = $request->description;
        // $post->body = $request->body;
        // $post->is_active = $request->is_active;
        // $post->slug = Str::slug($request->title);

        // //salva essa inclusao
        // $post->save();

        //Criacao via Mass Assignment Way
        //Se no name do input há o mesmo nome da que está na tabela, é possível criar um array associativo, simplificando

        $data = $request->all();
        $data['slug'] = Str::slug($data['title']);
        // $data['thumb'] = $request->file('thumb')->store('posts', 'public');
        $data['thumb'] = $request->thumb?->store('posts', 'public');

        $user = $user->find($request->user);
        $user->posts()->create($data);

        //redireciona para a pagina
        return redirect()->route('admin.posts.index');
    }

    public function edit($post, User $users) {
        $post = $this->post->findOrFail($post);
        $users = $users->all(['id', 'name']);

        return view('admin.posts.edit', compact('post', 'users'));
    }

    public function update($post, Request $request) {


        $post = $this->post->findOrFail($post);

        $data = $request->all();

        //se tiver imagem na request, remove a thumb atual e faz o novo upload
        if($request->thumb) {

            //remove a imagem atual em disco
            if($post->thumb) Storage::disk('public')->delete($post->thumb);

            $data['thumb'] = $request->thumb?->store('posts', 'public');
        }

        $post->update($data);

        return redirect()->route('admin.posts.index');
    }

    public function destroy($post) {
        $post = $this->post->findOrFail($post);

        $post->delete();

        return redirect()->back();
    }

}
