@extends('layouts.app')

@section('content')
    <h1>DASHBOARD</h1>
    <P>HOME.BLADE.PHP</P>

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
            @foreach ($orders as $elem )
          <tr>

            <td>{{$elem->customer_name}}</td>
            <td>{{$elem->phone_number}}</td>
            <td>{{$elem->email}}</td>
            <td>{{$elem->order_note}}</td>
            <td>{{$elem->total_price}}</td>
            <td>{{$elem->created_at}}</td>
          </tr>
          @endforeach
        </tbody>

    </table>



    <a href="{{route("admin.restaurants.index")}}">Ristorante</a>
@endsection
