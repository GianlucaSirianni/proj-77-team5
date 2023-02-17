@extends('layouts.app')

@section('content')

{{-- qui va la create --}}

<div class="text-center">
    <h1>Crea un Ristorante</h1>
</div>

<form action="{{route('admin.restaurants.store')}}" method="POST" enctype="multipart/form-data">

    @csrf

    <div>
        <label class="form-label">Nome del ristorante</label>
        <input class="form-control" type="text" name="name">
        @error('name')
            <div class="alert alert-danger">
                {{$message}}
            </div>
        @enderror
    </div>

    <div>
        <label for="">Indirizzo del ristorante</label>
        <input value="" class="form-control" type="text" name="address">
        @error('address')
            <div class="alert alert-danger">
                {{$message}}
            </div>
        @enderror
    </div>

    <div>
        <label for="">Vat</label>
        <input class="form-control" name="vat">
        @error('vat')
            <div class="alert alert-danger">
                {{$message}}
            </div>
        @enderror
    </div>



    {{-- Aggiunta immagine --}}

    <div class="my-3">
        <label>Aggiungi immagine ristorante</label>
        <input type="file" name="image" class="form-control-file">
    </div>

    <button type="submit" class="btn btn-primary mt-3">Crea</button>

</form>



@endsection
