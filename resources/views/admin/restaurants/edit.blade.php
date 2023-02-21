@extends('layouts.app')

@section('content')

<div>
    <h1>
        Modifica Ristorante
    </h1>
</div>

<form action="{{route('admin.restaurants.update',$restaurant_edit->id)}}" method="POST" enctype="multipart/form-data">

    @csrf
    @method('PUT')

    <div>
        <label class="form-label">Name</label>
        <input value="{{$restaurant_edit->name}}" class="form-control" type="text" name="name">
        @error('name')
            <div class="alert alert-danger">
                {{$message}}
            </div>
        @enderror
    </div>

    <div>
        <label for="">Address</label>
        <input value="{{$restaurant_edit->address}}" class="form-control" type="text" name="address">
        @error('address')
            <div class="alert alert-danger">
                {{$message}}
            </div>
        @enderror
    </div>

    <div>
        <label for="">P.IVA</label>
        <textarea class="form-control" name="vat">{{$restaurant_edit->vat}}</textarea>
        @error('vat')
            <div class="alert alert-danger">
                {{$message}}
            </div>
        @enderror
    </div>

    {{-- <div class="my-3">
        <label for="">Categoria</label>
        @foreach ($categories as $category)
        <label for="">
            <input type="checkbox" name="categories[]" value="{{$category->id}}">
            {{$category->name}}
        </label>
        @endforeach
    </div> --}}

    <div class="my-3">
        <label for="">Categoria</label>
        @foreach ($categories as $category)
        <label for="">
            <input type="checkbox" name="categories[]" value="{{$category->id}}" @if($restaurant_edit->category->contains($category->id)) checked @endif>
            {{$category->name}}
        </label>
        @endforeach
    </div>

<div class="my-3">
    <label>Aggiunta cover immagine</label>
    <input type="file" name="image" class="form-control-file">
</div>

<button type="submit" class="btn btn-primary mt-3">Modifica</button>

</form>
@endsection
