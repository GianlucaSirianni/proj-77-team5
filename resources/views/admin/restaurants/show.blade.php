@extends('layouts.app')

@section('content')

    <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h4>
                {{$restaurants_show->name}}
            </h4>
        </div>
        <div class="card-body">

            <div class="d-flex row-cols-2" style="height: 350px;">
                <div class="pb-3 pe-3 overflow-auto">
                    <h5>Address</h5>
                    <p class="card-text">{{$restaurants_show->address}}</p>
                    <h5>P.IVA</h5>
                    <p class="card-text">{{$restaurants_show->vat}}</p>
                </div>
                <div class="ratio" style="--bs-aspect-ratio: 50%;">
                    <img class="object-fit-md-cover border rounded" src="{{asset("storage/$restaurants_show->cover_restaurants")}}" alt="img">
                </div>

            </div>
        </div>
    </div>

@endsection

