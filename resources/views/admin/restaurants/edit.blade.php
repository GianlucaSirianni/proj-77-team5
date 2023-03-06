@extends('layouts.app')

@section('content')

<div class="pb-3">
    <h2 class="text-dark">
        Modifica il tuo<span class="ps-1 text-orange">Ristorante</span>
    </h2>
</div>


<form action="{{route('admin.restaurants.update',$restaurant_edit->id)}}" method="POST" enctype="multipart/form-data">

    @csrf
    @method('PUT')

    <p class="fw-bold" >Tutti i campi con * sono obbligatori!</p>
    <div>
        <label class="form-label fw-bold pb-2">Nome Ristorante *</label>
        <input value="{{$restaurant_edit->name}}" class="form-control" type="text" name="name" required>
        @error('name')
            <div class="alert alert-danger">
                {{$message}}
            </div>
        @enderror
    </div>

    <div>
        <label class="form-label fw-bold pb-2 pt-3">Indirizzo *</label>
        <input value="{{$restaurant_edit->address}}" class="form-control" type="text" name="address" required>
        @error('address')
            <div class="alert alert-danger">
                {{$message}}
            </div>
        @enderror
    </div>

    <div>
        <div class="form-label fw-bold pt-3 pb-2">Seleziona uno o piu categorie *</div>
        @foreach ($categories as $category)
        <label class="button-checkbox me-2">
            <input type="checkbox" name="categories[]" value="{{$category->id}}" @if($restaurant_edit->category->contains($category->id)) checked @endif>
            <span class="button-label">{{ $category->name }} </span>
        </label>
        @endforeach
    </div>

<div class="my-3">
    <div class="form-label fw-bold pt-3 pb-2">Aggiungi un immagine del tuo ristorante</div>
    <input type="file" name="image" class="form-control-file">
</div>

<button type="submit" class="btn mt-3" style="background-color: #FFAF00;">Modifica</button>

</form>
@endsection
