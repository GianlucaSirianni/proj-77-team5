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

    <div>
        <label class="form-label">Nome Piatto</label>
        <input value="{{$dish_edit->name}}" class="form-control" type="text" name="name" maxlength="25">
        @error('name')
            <div class="alert alert-danger">
                {{$message}}
            </div>
        @enderror
    </div>

    <div>
        <label for="">Ingredients</label>
        <input value="{{$dish_edit->ingredients}}" class="form-control" type="text" name="ingredients" maxlength="100">
        @error('ingredients')
            <div class="alert alert-danger">
                {{$message}}
            </div>
        @enderror
    </div>

    <div>
        <label for="">Description</label>
        <textarea class="form-control" name="description" maxlength="100">{{$dish_edit->description}}</textarea>
        @error('description')
            <div class="alert alert-danger">
                {{$message}}
            </div>
        @enderror
    </div>
    <div>
        <label for="">Price</label>
        <input class="form-control" type="number" name="price" value='{{$dish_edit->price}}' min="0">
        @error('price')
            <div class="alert alert-danger">
                {{$message}}
            </div>
        @enderror
    </div>

{{--
<div class="my-3">
    <label for="">Categoria</label>
    <select class="form-control" name="category_id" id="">
        <option value="">Seleziona Categoria</option>
        @foreach ($categories as $category)

            <option value="{{$category->id}}"{{$category->id == old('category_id', $restaurant_edit->category_id) ? 'selected':''}}>

                {{$category->name}}

            </option>

        @endforeach

    </select>
</div> --}}

{{-- <div class="my-3">

    <label for="">Tags</label>

    @foreach ($tags as $tag)

        <label for="">
            <input type="checkbox" name="tags[]" value="{{$tag->id}}" {{$restaurant_edit->tags->contains($tag) ? 'checked' : '' }}>
            {{$tag->name}}
        </label>

    @endforeach

</div> --}}

{{-- immagine --}}

 <div class="my-3">
    <label>Aggiunta cover piatto</label>
    <input type="file" name="image" class="form-control-file">
</div>

<button type="submit" class="btn btn-primary mt-3">Modifica</button>

</form>
@endsection
