<a href="{{ route('posts.create') }}">Criar novo post</a>
<hr>

@if (session('success'))
    <section>
        {{ session('success') }}
    </section>
@endif

<h1>Posts cadastrados</h1>

@forelse ($posts as $post)
    <ul>
        <li>{{ $post->id }}</li>
        <li>
            {{ $post->title }}
            <span>
                [<a href="{{ route('posts.show', $post->id) }}">Ver detalhes</a>]
            </span>
        </li>
        <li>{{ $post->content }}</li>
    </ul>
@empty
    <p>Nenhum post cadastrado</p>
@endforelse
