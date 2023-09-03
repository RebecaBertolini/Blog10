<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Gerenciamento de Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" w-full flex mb-10 justify-end ">
                <a href="{{ route( 'admin.posts.create' ) }}" class="px-4 py-2 shadow text-white text-bold bg-indigo-800 hover:bg-indigo-600 rounded transition ease-in-out durantion-300">Criar postagem</a>
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <table class="w-full rounded shadow p-4 cursor-default">
                    <thead>
                        <tr>
                            <th class="px-8 py-4 text-left text-white">n°</th>
                            <th class="px-8 py-4 text-left text-white">Autor(a)</th>
                            <th class="px-8 py-4 text-left text-white">Título</th>
                            <th class="px-8 py-4 text-left text-white">Criado em</th>
                            <th class="px-8 py-4 text-left text-white">Status</th>
                            <th class="px-8 py-4 te  xt-left text-white">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($posts as $post)
                        <tr>
                            <td class="px-8 py-4 text-left  font-thin text-white">{{ $post->id }}</td>
                            <td class="px-8 py-4 text-left  font-thin text-white">{{ $post->user?->name }}</td>
                            <td class="px-8 py-4 text-left font-thin text-white">{{ $post->title }}</td>
                            <td class="px-8 py-4 text-left font-thin text-white">{{ $post->created_at->format('d/m/Y H:i:s') }}</td>
                            <td class="px-8 py-4 text-left font-thin text-white">
                                <span class=" text-bold {{$post->is_active ? 'text-green-800 font-bold' : 'text-red-800 font-bold'}}">
                                    {{$post->is_active ? 'Ativo' : 'Inativo'}}
                                </span>
                            </td>
                            <td class="px-8 py-4 text-left font-thin text-white flex items-center gap-2">
                                <a href="{{ route('admin.posts.edit', $post->id) }}" class="px-4 py-2 shadow text-white
                                                                                                text-bold bg-indigo-900
                                                                                                hover:bg-indigo-700
                                                                                                rounded
                                                                                                transition
                                                                                                ease-in-out
                                                                                                durantion-300
                                                                                                h-10">Editar</a>
                                <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class=" bg-red-800
                                                        px-4 py-2
                                                        shadow
                                                        text-white
                                                        text-bold
                                                        hover:bg-red-600
                                                        rounded
                                                        transition
                                                        ease-in-out
                                                        durantion-300
                                                        h-10">Deletar</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4">Nenhum post econtrado!</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="text-white  mt-4">{{ $posts->links() }}</div>
        </div>
    </div>

</x-app-layout>
