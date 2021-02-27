<h1>Editar o post: <b>{{ $post->title }}</b></h1>

<form action="{{ route('posts.update', $post->id) }}" method="post">
    @method('put')
    @include('admin.posts.partials.form')
</form>
