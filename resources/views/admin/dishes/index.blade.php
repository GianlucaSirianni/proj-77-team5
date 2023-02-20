@extends('layouts.app')

@section('content')

{{-- qui va la create --}}
<div class="d-flex justify-content-between">
 <a href="{{ route('admin.dishes.create') }}">
    Crea un nuovo Piatto
    <i class="fa-solid fa-plus"></i>
</a>

<a href="{{route('admin.restaurants.index')}}">Torna al ristorante</a>
</div>


@foreach ($dishes as $elem)

        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">


                <h4 class="text-primary">
                    <a class="text-decoration-none" href="{{route('admin.dishes.show',$elem->id)}}">
                        {{$elem->name}}
                    </a>
                </h4>
                    {{-- qui c'e la destroy --}}
                <div>
                    <form action="{{route('admin.dishes.destroy', $elem->id)}}" method="POST">

                        @csrf
                        @method('DELETE')

                        <div>
                            <div>
                                <a class="btn btn-primary" href="{{route('admin.dishes.edit',$elem->id)}}">
                                    <i class="fa-solid fa-pen"></i>
                                </a>

                                <button type="submit" class="btn btn-danger">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card-body">
                <div class="d-flex row-cols-2" style="height: 350px;">
                    <div class="pb-3 pe-3 overflow-auto">
                        <h5>Ingredients</h5>
                        <p class="card-text">{{$elem->ingredients}}</p>
                        <h5>Description</h5>
                        <p class="card-text">{{$elem->description}}</p>
                        <h5>Price</h5>
                        <p class="card-text">{{$elem->price}}</p>
                    </div>
                    {{-- immagine --}}
                    <div class="ratio" style="--bs-aspect-ratio: 50%;">
                        <img class="object-fit-md-cover border rounded" src="{{asset("storage/$elem->cover_dish")}}" alt="img">
                    </div>

                </div>
            </div>
        </div>

    @endforeach

    {{-- {{$elem->links()}} --}}

@endsection



