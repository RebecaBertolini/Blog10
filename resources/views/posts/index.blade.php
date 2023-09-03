@vite(['resources/css/app.css', ])

@forelse( $posts as $post )

    <div class="block mb-4">
        @if ($post->thumb)
        <img src="{{ asset('storage/' . $post->thumb )}}" alt="Capa da postagem: . {{$post->title}}">

        @endif
        <h2>{{$post->title}} \ Criado em {{ $post->created_at->diffForHumans() }}</h2>
        <p>{{ $post->body }}</p>

        <a href="/posts/{{ $post->slug }}" class="mt-4 text-blue-600 hover:underline hover:text-blue-800">Ver post</a>
        <hr/>
    </div>

@empty

    <h2>Nenhum post encontrado!</h2>

@endforelse

{{$posts->links()}}
