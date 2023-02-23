@extends('layouts.app')

@section('content')

    <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h4>
                {{$dishes_show->name}}
            </h4>
        </div>
        <div class="card-body">

            <div class="d-flex row-cols-2" style="height: 350px;">
                <div class="pb-3 pe-3 overflow-auto">
                    <h5>Ingredients</h5>
                    <p class="card-text">{{$dishes_show->ingredients}}</p>
                    <h5>Description</h5>
                    <p class="card-text">{{$dishes_show->description}}</p>
                    <h5>Price</h5>
                    <p class="card-text">${{$dishes_show->price}}</p>
                </div>
                {{-- immagine --}}
                <div class="ratio" style="--bs-aspect-ratio: 50%;">
                    <img class="object-fit-md-cover border rounded" src="{{asset("storage/$dishes_show->cover_dish")}}" alt="img">
                </div>

            </div>
        </div>
    </div>

@endsection

