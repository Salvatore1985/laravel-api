@if ($post->exists)
    <form method="POST" action="{{ route('admin.posts.update', $post->id) }}">{{-- Mandiamo la route all'update con l'ID --}}
        {{-- nell EDIT ci vuole il mmetodo PATCH --}}
        @method('PATCH')
    @else
        <form method="POST" action="{{ route('admin.posts.store') }}">
@endif
@csrf

<div class="form-group">
    <label for="title">Titolo</label>
    <input type="text" class="form-control" id="title" name="title" placeholder="Inserisci qui il titolo"
        value="{{ $post->title }}">
</div>
<div class="form-group">
    <label for="content">contenuto del Post</label>
    <textarea class="form-control" id="content" name="content" rows="10" placeholder="Inserisci qui il Contenuto del post">
            {{-- Il valore viene inserito come se fosse contenuto --}}
            {{ $post->content }}
        </textarea>
</div>
<div class="form-group">
    <label for="image">Inserisci l'immagine del post</label>
    <input type="text" class="form-control" id="image" name="image" placeholder="Inserisci l'url di una immmagine"
        value="{{ $post->image }}">
</div>
<div class="d-flex justify-content-between">
    <button type="submit" class="btn btn-success">Salva</button>
    <div class="d-flex justify-content-end">
        <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">Torna alla lista</a>
    </div>

</div>

</form>
