@extends('layouts.app')

@section('content')
<div>
    <a class="btn btn-primary" href="{{ route("comics.create") }}">Aggiungi un nuovo prodotto</a>
</div>
@foreach ($comics as $comic)
    <li><a href="{{ route("comics.show", $comic->id) }}">{{$comic->title}}</a></li>
@endforeach
@endsection

