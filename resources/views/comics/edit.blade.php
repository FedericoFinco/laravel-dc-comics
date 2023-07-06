@extends('layouts.app')

@section('content')
<div class="container my-3">
    <h1>edit product</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="row g-4 py-4">
        <div class="col">
            <form action="{{ route('comics.update', $comic) }}" method="post" class="need-validation">
                @csrf
                @method("PUT")
            
                <label for="name">title</label>
                <input class="form-contro @error('title') is-invalid @enderror" type="text" name="title" value="{{ old("title") ?? $comic->title}}">
                @error
                    <div class="invalid-feedback">{{message}}</div>
                @enderror

                <label for="name">description</label>
                <input class="form-control @error('title') is-invalid @enderror" type="text" name="description" value="{{ old("description") ?? $comic->description}}">
                @error
                    <div class="invalid-feedback">{{message}}</div>
                @enderror

                <label for="name">thumb</label>
                <input class="form-control @error('title') is-invalid @enderror" type="text" name="thumb" value="{{ old("thumb") ?? $comic->thumb}}">
                @error
                    <div class="invalid-feedback">{{message}}</div>
                @enderror

                <label for="name">price</label>
                <input class="form-control @error('title') is-invalid @enderror" type="text" name="price" value="{{ old("price") ?? $comic->price}}">
                @error
                    <div class="invalid-feedback">{{message}}</div>
                @enderror

                <label for="name">series</label>
                <input class="form-control @error('title') is-invalid @enderror" type="text" name="series" value="{{ old("series") ?? $comic->series}}">
                @error
                    <div class="invalid-feedback">{{message}}</div>
                @enderror

                <label for="name">sale_date</label>
                <input class="form-control @error('title') is-invalid @enderror" type="text" name="sale_date" value="{{ old("sale_date") ?? $comic->sale_date}}">
                @error
                    <div class="invalid-feedback">{{message}}</div>
                @enderror

                <label for="inputType" class="form-label">Type</label>
                    <select name="type" class="form-control" id="inputType">
                        @foreach ($types as $type)
                            <option @selected($comic->type == $type->type) value="{{ $type->type }}">{{ $type->type }}</option>
                        @endforeach
                    </select>

                <input class="form-control mt-4 btn btn-primary" type="submit" value="Invia">
            </form>
        </div>
    </div>
    <form id="deleteForm" action="{{ route('comics.destroy', $comic) }}" method="post">
        @csrf
        @method('DELETE')
        <input onclick="confirmDelete()" class="btn btn-danger" type="submit" value="Cancella il prodotto">
    </form>
    <script>
        function confirmDelete() {
            let r = confirm("Sei sicuro di cancellare?");
            if (r) {
                document.getElementById("deleteForm").submit();
            }
        }
    </script>
    
    
    

</div>
@endsection