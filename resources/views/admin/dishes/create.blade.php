@extends('layouts.app')

@section('content')

{{-- qui va la create --}}

<div class="text-center">
    <h1>Crea un Piatto</h1>
</div>

<form action="{{route('admin.dishes.store')}}" method="POST" enctype="multipart/form-data">

    @csrf

    <div>
        <label class="form-label">Nome del Piatto</label>
        <input class="form-control" type="text" name="name">
        @error('name')
            <div class="alert alert-danger">
                {{$message}}
            </div>
        @enderror
    </div>

    <div>
        <label for="">Ingredients</label>
        <input value="" class="form-control" type="text" name="ingredients">
        @error('ingredients')
            <div class="alert alert-danger">
                {{$message}}
            </div>
        @enderror
    </div>

    <div>
        <div>
            <label for="">Descriptions</label>
            <textarea class="form-control" name="description"></textarea>
            @error('description')
                <div class="alert alert-danger">
                    {{$message}}
                </div>
            @enderror
        </div>
    </div>
    <div>
        <label for="">Price</label>
        <input value="" class="form-control" type="text" name="price">
        @error('price')
            <div class="alert alert-danger">
                {{$message}}
            </div>
        @enderror
    </div>



    {{-- Aggiunta immagine --}}

    <div class="my-3">
        <label>Aggiungi immagine piatto</label>
        <input type="file" name="image" class="form-control-file">
    </div>

    <button type="submit" class="btn btn-primary mt-3">Crea</button>

</form>



@endsection
