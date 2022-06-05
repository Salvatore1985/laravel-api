@extends('layouts.app')

@section('content')
    <div class="container">
        <header>
            <h1>Modifica Post</h1>
        </header>

        {{-- Aggiungere in tutti i campi il value --}}
        <section id="from">
            @include('includes.admin.posts.form')
        </section>
    </div>
@endsection
