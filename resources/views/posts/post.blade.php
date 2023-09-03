{{-- return 'Página de posts <br>' . $post; --}}


{{-- Aqui o laravel irá usar uma sintaxe diferente para exibicao, que seria como o echo do php, mas que é diferente por ser processado com o blade. --}}
{{-- {{ $post->title }} / Cirado em: {{ $post->created_at->diffForHumans() }}
<hr/>

{{ $post->body }} --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Postagem') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">


            <div class="w-full  mb-6 text-bolder bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="w-full items-baseline p-6 text-gray-900 dark:text-gray-100">
                    <div>
                        <a href="{{ route('dashboard') }}" class="mt-4 text-indigo-500 hover:text-indigo-600">Voltar</a>
                        <h2 class="ext-4xl font-bold text-xl text-center text-gray-900 dark:text-white my-10">{{ $post->title }}
                        </h2>
                        <h4 class="m-4 text-lg text-center">{{ $post->description }}</h4>
                        <hr />
                        <p class="text-justify my-6">{{ $post->body }}</p>

                    </div>

                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    @if ($post->thumb)
                        <div class="w-full flex justify-center">
                            <img src="{{ asset('storage/' . $post->thumb) }}" class="" alt="Imagem da postagem" .
                                {{ $post->title }}>
                        </div>
                    @endif

                    <div class="mt-6 text text-end">

                        <p class="mt-6 text">Autor: {{ $post->user->name }}</p>

                    </div>
                </div>



            </div>
        </div>
</x-app-layout>
