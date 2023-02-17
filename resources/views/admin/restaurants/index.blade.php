@extends('layouts.app')

@section('content')

{{-- qui va la create --}}

<a href="{{ route('admin.restaurants.create') }}">
    Crea un nuovo Ristorante
    <i class="fa-solid fa-plus"></i>
</a>



@endsection



