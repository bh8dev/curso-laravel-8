@extends('admin.layouts.app')

@section('title', 'Detalhes do post')

@section('header')
    <h1>Detalhes do Post: {{ $post->title }}</h1>
@endsection

@section('content')
    <ul>
        <li>
            <b>Título:</b>
            {{ $post->title }}
        </li>
        <li>
            <b>Conteúdo:</b>
            {{ $post->content }}
        </li>
    </ul>

    <form action="{{ route('posts.destroy', $post->id) }}" method="post">

        @csrf
        @method('delete')

        <button type="submit">Deletar o post: {{ $post->title }}</button>
    </form>
@endsection
