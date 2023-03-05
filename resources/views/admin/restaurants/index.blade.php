@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                @foreach ($restaurants as $elem)
                    <h2 class="text-dark pb-2">Il tuo <span class="text-orange">Ristorante</span></h2>
                    <div class="card mb-4">
                        <a href="{{ route('admin.restaurants.edit', $elem->id) }}">

                            <div class="ratio" style="--bs-aspect-ratio: 50%;">
                                <img class="img-fluid  border rounded" src="{{ asset("storage/$elem->cover_restaurants") }}"
                                    alt="img">
                            </div>

                        </a>
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <h2 class="text-dark me-4">{{ $elem->name }}</h2>
                                @foreach ($elem->category as $categoryIndex => $cat)
                                    <span class="badge rounded-pill text-bg-warning fw-bold me-2">{{ $cat['name'] }}</span>
                                @endforeach
                            </div>
                            <div>
                                <div>
                                    <a class="btn btn-dark" href="{{ route('admin.restaurants.edit', $elem->id) }}">
                                        <i class="fa-solid fa-pen"></i>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-md-6">
                <h2 class="text-dark pb-2">Ordini <span class="text-orange">Ricevuti</span></h2>

                <div class="accordion" id="accordionExample">
                    @php
                        $num = count($orders);
                    @endphp
                    @foreach ($orders as $elem)
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading{{ $elem->id }}">
                                <button class="accordion-button fs-5" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse{{ $elem->id }}" aria-expanded="false"
                                    aria-controls="collapse{{ $elem->id }}">
                                    <span class="text-dark">Ordine #{{ $num }} - {{ $elem->created_at }}</span>
                                </button>
                            </h2>
                            <div id="collapse{{ $elem->id }}" class="accordion-collapse collapse"
                                aria-labelledby="heading{{ $elem->id }}" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <h6 class="text-orange">Nome Cliente</h6><span>{{ $elem->customer_name }}</span>
                                    <h6 class="text-orange">Cellulare</h6><span>+39 {{ $elem->phone_number }}</span>
                                    <h6 class="text-orange">Email</h6><span>{{ $elem->email }}</span>
                                    <h6 class="text-orange">Note</h6><span>{{ $elem->order_note }}</span>
                                    <h6 class="text-orange">Prezzo</h6><span>{{ $elem->total_price }} €</span>
                                    <h6 class="text-orange">Ricezione</h6><span>{{ $elem->created_at }}</span>
                                </div>
                            </div>
                        </div>
                        @php
                            $num--;
                        @endphp
                    @endforeach
                </div>




                {{-- <div class="accordion" id="accordionExample">
                    @foreach ($orders as $elem)
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading{{ $elem->id }}">
                                <button class="accordion-button fs-5" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse{{ $elem->id }}" aria-expanded="false"
                                    aria-controls="collapse{{ $elem->id }}">
                                    <span class="text-dark">Ordine {{ $elem->created_at }}</span>
                                </button>
                            </h2>
                            <div id="collapse{{ $elem->id }}" class="accordion-collapse collapse"
                                aria-labelledby="heading{{ $elem->id }}" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <h6 class="text-orange">Nome Cliente</h6><span>{{ $elem->customer_name }}</span>
                                    <h6 class="text-orange">Cellulare</h6><span>{{ $elem->phone_number }}</span>
                                    <h6 class="text-orange">Email</h6><span>{{ $elem->email }}</span>
                                    <h6 class="text-orange">Note</h6><span>{{ $elem->order_note }}</span>
                                    <h6 class="text-orange">Prezzo</h6><span>{{ $elem->total_price }} €</span>
                                    <h6 class="text-orange">Ricezione</h6><span>{{ $elem->created_at }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div> --}}



            </div>
    </div>
</div>{{-- qui va la create --}}


@endsection
