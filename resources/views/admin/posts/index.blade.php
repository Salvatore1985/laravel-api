@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('alert-message'))
            <div class="alert alert-{{ session('alert-type') }}">
                {{ session('alert-message') }}
            </div>
        @endif
        <header class="my-4 d-flex justify-content-between align-items-center">
            <h1>I miei post</h1>
            <a href="{{ route('admin.posts.create') }}" class="btn btn-success">Nuovo Post</a>
        </header>
        <table class="table table-dark table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Scritto il</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        {{-- <td>{{ $post->getFormatteDate('created_at') }}</td> --}}
                        {{-- Oppure --}}
                        <td>{{ $post->getFormatteDate('created_at', 'd-m-Y') }}</td>
                        <td class="d-flex justify-content-end">
                            <a href="{{ route('admin.posts.show', $post->id) }}" class="btn btn-primary ">Vai</a>
                            <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-warning ml-2">Modifica</a>
                            <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST"
                                class="delete-button">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger ml-2">Elimina</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">Non ci sono post da visualizare.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <footer class="d-flex justify-content-end">
            {{-- Aggiungo alla footer i numeri delle pagine con i link --}}
            {{ $posts->links() }}
        </footer>

    </div>
    @section('scripts')
        <script>
            const deleteButtons = document.querySelectorAll('.delete-button');
            deleteButtons.forEach(form => {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    const conf = confirm('Sei sicuro di voler eliminare il Post?');
                    if (conf) this.submit();
                })
            });
        </script>
    @endsection
@endsection
