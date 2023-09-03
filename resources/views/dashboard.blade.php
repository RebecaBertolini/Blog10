<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Postagens') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @forelse ($posts as $post)
                <div class="w-full mb-6 text-bolder bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="flex justify-between items-baseline p-6 text-gray-900 dark:text-gray-100">
                        <div>
                            <h2 class="ext-4xl font-bold text-gray-900 dark:text-white">{{ $post->title }}</h2>
                            <p class="m-4">{{ $post->description }}</p>
                            <a href="/posts/{{ $post->slug }}" class="mt-4 text-indigo-500 hover:text-indigo-600">Ver
                                postagem</a>
                        </div>
                        <div class="flex flex-col justify-between h-full">
                            <p>Autor: {{ $post->user->name }}</p>
                            <p>Criado {{ $post->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    Nenhuma postagem encontrada!
                </div>
            @endforelse

            {{ $posts->links() }}

        </div>
    </div>
</x-app-layout>
