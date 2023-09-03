<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Criar postagem') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-5">
                <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf <!-- cria um input name _token com o valor do token.incluir um token de segurança CSRF (Cross-Site Request Forgery) no formulário para protecao contra ataques.-->
                    <!-- O servidor verifica se o token enviado com o form corresponde ao token da sessao do usuario -->
                    <div class="w-full mb-6">
                        <label for="" class="block text-white my-4">Título</label>
                        @error('title')
                            <div class="mb-4 px-6 w-full rounded border border-red-400 bg-red-300 text-red-900 font-bold">
                                {{$message}}
                            </div>
                        @enderror
                        <input type="text" class="w-full dark:bg-gray-400 rounded" name="title">
                    </div>
                    <div class="w-full mb-6">
                        <label for="" class="block text-white my-4">Descrição</label>
                        <input type="text" class="w-full dark:bg-gray-400 rounded" name="description">
                    </div>
                    <div class="w-full mb-6">
                        <label for="" class="block text-white my-4">Conteúdo</label>
                        @error('body')
                            <div class="mb-4 px-6 w-full rounded border border-red-400 bg-red-300 text-red-900 font-bold">
                                {{$message}}
                            </div>
                        @enderror
                        <textarea class="w-full dark:bg-gray-400 h-32 flex items-start rounded" rows="5" name="body"></textarea>
                    </div>
                    <div class="w-full mb-6">
                        <label for="" class="block text-white my-4">Autor da postagem</label>
                        @error('user')
                            <div class="mb-4 px-6 w-full rounded border border-red-400 bg-red-300 text-red-900 font-bold">
                                {{$message}}
                            </div>
                        @enderror
                        <select name="user" class="mb-4 block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                            <option value="">Selecione o autor</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="w-full mb-6">
                        <label for="" class="block mb-2 font-medium text-gray-900 dark:text-white">Capa da postagem</label>
                        @error('thumb')
                            <div class="mb-4 px-6 w-full rounded border border-red-400 bg-red-300 text-red-900 font-bold">
                                {{$message}}
                            </div>
                        @enderror
                        <input type="file" class="block w-full text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" name="thumb">
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG or GIF (MAX. 800x400px).</p>
                    </div>
                    <div class="w-full mb-6">
                        <label for="" class="block text-white my-4 bg-white-400">Status</label>

                        <div class="flex gap-5 mt-5">
                            <input type="radio" class="" name="is_active" value="1" checked> Ativo
                            <input type="radio" class="" name="is_active" value="0"> inativo
                        </div>
                    </div>
                    <button class="text-white px-4 py-2 shadow text-white text-bold bg-fuchsia-800 hover:bg-fuchsia-600 rounded transition ease-in-out durantion-300">Criar postagem</button>
                </form>

            </div>
        </div>
    </div>

</x-app-layout>
