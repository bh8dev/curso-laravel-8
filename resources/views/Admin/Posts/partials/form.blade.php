@if ($errors->any())
    <section>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </section>
@endif

@csrf
<input type="text" name="title" id="title" placeholder="Titulo" value="{{$post->title ?? old('title')}}" min="3" max="160" required autofocus>

<input type="file" name="image" id="image">

<textarea name="content" id="content" cols="30" rows="4" placeholder="Conteúdo" minlength="5" maxlength="10000">{{$post->content ?? old('content')}}</textarea>

<button type="submit">Enviar</button>