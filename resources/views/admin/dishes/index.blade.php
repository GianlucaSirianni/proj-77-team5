@extends('layouts.app')

@section('content')
    {{-- qui va la create --}}
    <div class="container-md">
        <div>
            <h2 class="text-dark mb-4">Il tuo<span class="text-orange ps-2">Menu</span></h2>
            <a href="{{ route('admin.dishes.create') }}">
                <span class="btn" style="background-color: #fca502" >Crea un nuovo piatto</span>
            </a>
        </div>
    </div>

    <div class="container-md">
        <div class="row justify-content-center">
            @foreach ($dishes as $elem)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <a href="{{ route('admin.dishes.show', $elem->id) }}">
                            <div class="ratio" style="--bs-aspect-ratio: 50%;">
                                <img class="object-fit-md-cover border rounded"
                                    src="{{ asset("storage/$elem->cover_dish") }}" alt="img">
                            </div>
                        </a>
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h4 class="">
                                <a class="text-decoration-none"
                                style="color: #fca502"
                                    href="{{ route('admin.dishes.show', $elem->id) }}">
                                    {{ $elem->name }}
                                </a>
                            </h4>
                            {{-- qui c'e la destroy --}}
                            <div>
                                <form action="{{ route('admin.dishes.destroy', $elem->id) }}" method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <div>
                                        <div>
                                            <a class="btn btn-primary" href="{{ route('admin.dishes.edit', $elem->id) }}">
                                                <i class="fa-solid fa-pen"></i>
                                            </a>

                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal-{{$elem->id}}">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>

                                            {{-- finestra-modale --}}
                                            <div class="modal fade" id="exampleModal-{{$elem->id}}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                                Attenzione!!!
                                                            </h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Sei sicuro di voler eliminare questo piatto?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-success"
                                                                data-bs-dismiss="modal">Annulla</button>
                                                            <button type="submit" class="btn btn-danger">Conferma</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>



    {{-- {{$elem->links()}} --}}
@endsection

