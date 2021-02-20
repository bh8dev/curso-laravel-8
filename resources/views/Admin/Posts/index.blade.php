<a href="{{ route('posts.create') }}">Criar novo post</a>
<hr>

@if (session('success'))
    <section>
        {{ session('success') }}
    </section>
@endif

<h1>Posts cadastrados</h1>

@foreach ($posts as $post)

    <p>
        {{ $post->title }}
        [
            <a href="{{ route('posts.edit', $post->id) }}">Editar</a>
            |
            <a href="{{ route('posts.show', $post->id) }}">Ver detalhes</a>
        ]
    </p>
@endforeach

<hr>

{{ $posts->links() }}
