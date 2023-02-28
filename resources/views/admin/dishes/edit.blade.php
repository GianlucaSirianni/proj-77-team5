@extends('layouts.app')

@section('content')

<div>
    <h1>
        Modifica Piatto
    </h1>
</div>

<form action="{{route('admin.dishes.update',$dish_edit->id)}}" method="POST" enctype="multipart/form-data">

    @csrf
    @method('PUT')

    <p class="text-center">Tutti i campi con * sono obbligatori!</p>

    <div>
        <label class="form-label">Nome Piatto *</label>
        <input value="{{$dish_edit->name}}" class="form-control" type="text" name="name" maxlength="25" required>
        @error('name')
            <div class="alert alert-danger">
                {{$message}}
            </div>
        @enderror
    </div>

    <div>
        <label for="">Ingredients *</label>
        <input value="{{$dish_edit->ingredients}}" class="form-control" type="text" name="ingredients" maxlength="250" required>
        @error('ingredients')
            <div class="alert alert-danger">
                {{$message}}
            </div>
        @enderror
    </div>

    <div>
        <label for="">Description</label>
        <textarea class="form-control" name="description" maxlength="500">{{$dish_edit->description}}</textarea>
        @error('description')
            <div class="alert alert-danger">
                {{$message}}
            </div>
        @enderror
    </div>
    <div>
        <label for="">Price *</label>
        <input class="form-control" type="number" name="price" value='{{$dish_edit->price}}' min="0" max="999.99" step="0.01" required>
        @error('price')
            <div class="alert alert-danger">
                {{$message}}
            </div>
        @enderror
    </div>

    <div>
        <label for="visible">Visible</label>
        <input type="checkbox" id="visible" name="visible" value="1" @if(old('visible', $dish_edit->visible)) checked @endif>
    </div>


 <div class="my-3">
    <label>Aggiunta cover piatto</label>
    <input type="file" name="image" class="form-control-file">
</div>

<button type="submit" class="btn btn-primary mt-3">Modifica</button>

</form>
@endsection
