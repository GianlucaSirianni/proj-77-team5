@extends('layouts.app')

@section('content')

{{-- qui va la create --}}

<a href="{{ route('admin.restaurants.create') }}">
    Crea un nuovo Ristorante
    <i class="fa-solid fa-plus"></i>
</a>

@foreach ($restaurants as $elem)

        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">


                <h4 class="text-primary">
                    <a class="text-decoration-none" href="{{route('admin.restaurants.show',$elem->id)}}">
                        {{$elem->name}}
                    </a>
                </h4>

                <div>
                    <form action="{{route('admin.restaurants.destroy', $elem->id)}}" method="POST">

                        @csrf
                        @method('DELETE')

                        <div>
                            <div>
                                <a class="btn btn-primary" href="{{route('admin.restaurants.edit',$elem->id)}}">
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
                        <h5>Ingredienti</h5>
                        <p class="card-text">{{$elem->name}}</p>
                        <h5>Descrizione</h5>
                        <p class="card-text">{{$elem->address}}</p>
                        <h5>Difficoltà</h5>
                        <p class="card-text">{{$elem->vat}}</p>
                        {{-- <h5>Tempo di preparazione</h5>
                        <p class="card-text">{{$elem->tempo_cottura}}</p>
                        <h5>Portata</h5> --}}

                    </div>

                    <div class="ratio" style="--bs-aspect-ratio: 50%;">
                        <img class="object-fit-md-cover border rounded" src="{{asset("storage/$elem->photo")}}" alt="img">
                    </div>

                </div>
            </div>
        </div>
    @endforeach

    {{-- {{$elem->links()}} --}}

@endsection



