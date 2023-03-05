@extends('layouts.app')

@section('content')

{{-- qui va la create --}}

<div class="pb-2">
    <h2 class="text-dark">
        Crea il tuo<span class="ps-2 text-orange">Piatto</span>
    </h2>
</div>

<form action="{{route('admin.dishes.store')}}" method="POST" enctype="multipart/form-data">

    @csrf

    <p class="fw-bold">Tutti i campi con * sono obbligatori!</p>

    <div>
        <label class="form-label fw-bold">Nome del Piatto *</label>
        <input class="form-control" type="text" name="name" required maxlength="25">
        @error('name')
            <div class="alert alert-danger">
                {{$message}}
            </div>
        @enderror
    </div>

    <div>
        <label class="form-label fw-bold">Ingredienti *</label>
        <input value="" class="form-control" type="text" name="ingredients"required maxlength="250">
        @error('ingredients')
            <div class="alert alert-danger">
                {{$message}}
            </div>
        @enderror
    </div>

    <div>
        <div>
            <label class="form-label fw-bold">Descrizione</label>
            <textarea class="form-control" name="description" maxlength="500"></textarea>
            @error('description')
                <div class="alert alert-danger">
                    {{$message}}
                </div>
            @enderror
        </div>
    </div>
    <div>
        <label class="form-label fw-bold">Prezzo *</label>
        <input value="" class="form-control" type="number" name="price" min='0' max="999.99" step="0.01" required>
        @error('price')
            <div class="alert alert-danger">
                {{$message}}
            </div>
        @enderror
    </div>

    <div class="pt-3">
        <label class="form-label fw-bold" for="visible">Disponile:</label>
        <input class="align-middle" type="checkbox" id="visible" name="visible" value="1" @if(old('visible')) checked @endif>
    </div>



    {{-- Aggiunta immagine --}}

    <div class="pt-2">
        <label class="form-label fw-bold pb-2">Aggiungi un immagine del piatto</label>
        <input type="file" name="image" class="form-control-file">
    </div>

    <button type="submit" class="btn btn-primary mt-3">Crea</button>

</form>



@endsection
