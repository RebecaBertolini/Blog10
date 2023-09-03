<?php

//MVC -> Model -> View -> Controller
//Controller: nao focado em manter logicas, mas receber os dados da requisicao e delegar pro modal ou passar pra uma view;
//View: Camada de interacao com o sistema ou entrega de JSON para outro sistema
//Model: processa ou contem a regra de negocio, nao somente com BD necessariamnte

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//ao acessar a rota (URI) especificada, é recebido pelo index(Front Controller)
//Ele procura a rota no route collection -> quando acha, ele executa o callback
//o resultado do callback da rota é retornado como resposta

//view carrega um arquivo da raiz do projeto, em resources/view




Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);
Route::get('/posts/{post}', [\App\Http\Controllers\HomeController::class, 'show']);

//Rotas admin posts

// Route::prefix('/admin')->group(function () {
//     Route::prefix('/posts')->controller(\App\Http\Controllers\Admin\PostsController::class)->group(function () {
//         Route::get('/', 'index');
//         Route::get('/create', 'create');
//     });
// });

//mesma rota de cima, porém criando apelidos para as rotas, o que permite alterar o nome das rotas futuramente, sem ter que mexer nas views
Route::prefix('/admin')->middleware('auth')->name('admin.')->group(function () {

    // Route::prefix('/posts')->name('posts.')->controller(\App\Http\Controllers\Admin\PostsController::class)->group(function () {
    //     Route::get('/', 'index')->name('index'); //apelido(name) admin.posts.index
    //     Route::get('/create', 'create')->name('create'); //apelido(name) admin.posts.create
    //     Route::post('/store', 'store')->name('store');

    //     Route::get('/{post}/edit', 'edit')->name('edit');
    //     Route::post('/{post}/edit', 'update')->name('update');

    //     Route::post('/{post}', 'destroy')->name('destroy');
    // });

    //Controllers como recurso ou restfullcontrollers

    //os verbos http guiam a requisicao
    //Post: GET, POST, PUT, PATCH, DELETE

    //GET /posts
    //POST /posts
    //o caminho é o mesmo, mas o verbo enviado junto indica a acao

    Route::resource('posts', \App\Http\Controllers\Admin\PostsController::class);
});

//Rotas do Laravel Breeze. Entrega um Admin inicial
//com Login, registro, dashboard e reset de senha.
Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
