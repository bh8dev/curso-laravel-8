@extends('admin.layouts.app')

@section('title', 'Cadastrar post')

@section('header')
    <h1>Cadastrar novo post</h1>
@endsection

@section('content')
    <form action="{{ route('posts.store') }}" method="post">
        @include('admin.posts.partials.form')
    </form>
@endsection
