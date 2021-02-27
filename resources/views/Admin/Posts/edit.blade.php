@extends('admin.layouts.app')

@section('title', 'Edição de post')

@section('header')
    <h1>Editar o post: <b>{{ $post->title }}</b></h1>
@endsection

@section('content')
    <form action="{{ route('posts.update', $post->id) }}" method="post">
        @method('put')
        @include('admin.posts.partials.form')
    </form>
@endsection
