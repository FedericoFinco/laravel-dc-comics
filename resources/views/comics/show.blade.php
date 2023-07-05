@extends('layouts.app')

@section('content')
<div class="container my-3">
    <a class="btn btn-primary" href="{{ route("comics.edit", $comic) }}">Modifica questo prodotto</a>
    <h1>Dettagli: {{$comic->title}}</h1>
    <div class="row g-4">
        <div class="col">
            <a href="{{ route("home") }}">Torna alla lista prodotti</a>
        </div>
    </div>

</div>
@endsection