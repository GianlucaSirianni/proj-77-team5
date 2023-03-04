@extends('layouts.app')

@section('content')
    {{-- qui va la create --}}

    @foreach ($restaurants as $elem)
        <div class="container">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">


                    <h4 class="text-primary">
                        <a class="text-decoration-none text-dark fw-bold"
                            href="{{ route('admin.restaurants.show', $elem->id) }}">
                            {{ $elem->name }}
                            @foreach ($elem->category as $categoryIndex => $cat)
                                <span class="badge rounded-pill text-bg-warning fw-bold">{{ $cat['name'] }}</span>
                            @endforeach
                        </a>
                    </h4>
                    {{-- qui c'e la destroy --}}
                    <div>
                        <form action="{{ route('admin.restaurants.destroy', $elem->id) }}" method="POST">

                            @csrf
                            @method('DELETE')

                            <div>
                                <div>
                                    <a class="btn btn-dark" href="{{ route('admin.restaurants.edit', $elem->id) }}">
                                        <i class="fa-solid fa-pen"></i>
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    {{-- <div class="d-flex row-cols-2" style="height: 350px;">
                        <div class="pb-3 pe-3 overflow-auto">
                            <h5>Indirizzo</h5>
                            <p class="card-text">{{$elem->address}}</p>
                            <h5>P.IVA</h5>
                            <p class="card-text">{{$elem->vat}}</p>
                            <h5>Categorie</h5>
                            @foreach ($elem->category as $cat)
                                <p>{{$cat->name}}</p>
                            @endforeach --}}

                    {{-- bottone il tuo menu --}}


                    {{-- </div> --}}

                    <div class="ratio" style="--bs-aspect-ratio: 50%;">
                        <img class="img-fluid  border rounded" src="{{ asset("storage/$elem->cover_restaurants") }}"
                            alt="img">
                    </div>

                </div>
            </div>
        </div>
    @endforeach

    {{-- dati-ordini --}}
    <div class="container">
        <table class="table  table-hover">
            <thead>
                <tr>
                    <th scope="col">Nome Cliente</th>
                    <th scope="col">Numero telefono</th>
                    <th scope="col">Email</th>
                    <th scope="col">Note</th>
                    <th scope="col">Prezzo</th>
                    <th scope="col">Giorno/Orario Ricezione</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $elem)
                    <tr>
                        <td>{{ $elem->customer_name }}</td>
                        <td>{{ $elem->phone_number }}</td>
                        <td>{{ $elem->email }}</td>
                        <td>{{ $elem->order_note }}</td>
                        <td>{{ $elem->total_price }}</td>
                        <td>{{ $elem->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>
@endsection
