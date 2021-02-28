@extends('admin.layouts.app')

@section('title', 'Listagem de posts cadastrados')

@section('header')
    <h1>Posts cadastrados no sistema</h1>
@endsection

@section('content')
    <a href="{{ route('posts.create') }}">Criar novo post</a>
    <hr>

    @if (session('success'))
        <section>
            {{ session('success') }}
        </section>
    @endif

    <form action="{{ route('posts.search') }}" method="post">
        @csrf
        <input type="text" name="search" placeholder="Digite sua pesquisa" autofocus>
        <button type="submit">Filtrar</button>
    </form>

    @foreach ($posts as $post)

        <p>
            <img src="{{ url("storage/{$post->image}") }}" alt="{{ $post->title }}" style="max-width: 100px; border-radius: 50px;">
            {{ $post->title }}
            [
                <a href="{{ route('posts.edit', $post->id) }}">Editar</a>
                |
                <a href="{{ route('posts.show', $post->id) }}">Ver detalhes</a>
            ]
        </p>
    @endforeach

    <hr>
    @if (isset($filters))
        {{ $posts->appends($filters)->links() }}
    @else
        {{ $posts->links() }}
    @endif
@endsection
