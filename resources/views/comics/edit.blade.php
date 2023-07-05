@extends('layouts.app')

@section('content')
<div class="container my-3">
    <h1>edit product</h1>
    <div class="row g-4 py-4">
        <div class="col">
            <form action="{{ route('comics.update', $comic) }}" method="post">
                @csrf
                @method("PUT")
            
                <label for="name">title</label>
                <input class="form-control" type="text" name="title" value="{{$comic->title}}">

                <label for="name">description</label>
                <input class="form-control" type="text" name="description" value="{{$comic->description}}">

                <label for="name">thumb</label>
                <input class="form-control" type="text" name="thumb" value="{{$comic->thumb}}">

                <label for="name">price</label>
                <input class="form-control" type="text" name="price" value="{{$comic->price}}">

                <label for="name">series</label>
                <input class="form-control" type="text" name="series" value="{{$comic->series}}">

                <label for="name">sale_date</label>
                <input class="form-control" type="text" name="sale_date" value="{{$comic->sale_date}}">

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