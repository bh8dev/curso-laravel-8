<h1>Posts cadastrados</h1>

@forelse ($posts as $post)
    <ul>
        <li>{{ $post->id }}</li>
        <li>{{ $post->title }}</li>
        <li>{{ $post->content }}</li>
    </ul>
@empty
    <p>Nenhum post cadastrado</p>
@endforelse