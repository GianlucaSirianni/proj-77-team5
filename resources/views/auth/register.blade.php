@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center fs-4">{{ __('Utente') }}</div>

                <div class="card-body py-4 px-0">
                    {{-- FORM DI REGISTRAZIONE --}}
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        {{-- UTENTE --}}

                        <p class="text-center">Tutti i campi con * sono obbligatori.</p>

                        <div class="px-3 w-75 m-auto ">
                            <div class="form-group row">
                                <label for="username">{{ __('Nome *') }}</label>

                            <div>
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" pattern="[a-zA-Z]+" required autocomplete="username" autofocus>

                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="surname">{{ __('Cognome *') }}</label>

                            <div>
                                <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" required autocomplete="surname" pattern="[a-zA-Z]+" autofocus>

                                    @error('surname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email">{{ __('E-Mail *') }}</label>

                                <div>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password">{{ __('Password *') }}</label>

                                <div>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm">{{ __('Conferma Password *') }}</label>

                                <div>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                        </div>



                        {{--RISTORANTE --}}
                        <div class="card-header text-center fs-4 mb-4">{{ __('Ristorante') }}</div>

                        <div class="px-3 my-3 w-75 m-auto">

                            <div class="form-group row">
                                <label for="name">{{ __('Nome Ristorante *') }}</label>

                                <div>
                                    <input id="name" type="text" class="form-control" name="name" required autocomplete="name">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address">{{ __('Indirizzo *') }}</label>

                            <div>
                                <input id="address" type="text" class="form-control" name="address" required autocomplete="address" pattern="[a-zA-Z0-9]+[^,!?]*" required>
                            </div>
                        </div>


                            <div class="form-group row">
                                <label for="vat">{{ __('P.Iva *') }}</label>
                                <div>
                                    <input id="vat" type="text" class="form-control @error('vat') is-invalid @enderror" name="vat" maxlength="11" minlength="11" required autocomplete="vat">
                                    @error('vat')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- QUESTE SONO LE CATEGORIE --}}



                        </div>


                        <div class="card-header text-center fs-5 mb-4 w-100">{{ __('Seleziona categorie *:') }}</div>
                        <div class="flex-center">

                            <div class="d-flex flex-wrap m-auto justify-content-center">
                                @foreach ($categories as $category)
                                <label class="button-checkbox me-2">
                                    <input type="checkbox" name="categories[]" value="{{$category->id}}">
                                    <span class="button-label">{{$category->name}} </span>
                                </label>
                                @endforeach
                            </div>

                        </div>

                        <div class="d-flex justify-content-center">
                            <div>
                                <button type="submit" class="btn btn-primary my-3">
                                    {{ __('Registrati') }}
                                </button>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script defer>

    const arrayCategories = Array.from(document.querySelectorAll('input[type="checkbox"]'))

    const button = document.querySelector('button[type="submit"]')

    arrayCategories.forEach((checkbox, index , array) =>{

        checkbox.addEventListener('click', validateCheckbox.bind( null , array , button))
    })

    function validateCheckbox(arr, btn){

        let counter = 0

        arr.forEach(element => {

            if(element.checked){

                counter++
            }

        })

        if(counter){

            btn.disabled = ''
            console.log('alemo una checkcazz')
        }else{

            btn.disabled = 'disabled'

            console.log('no')
        }
    };

    validateCheckbox(arrayCategories,button)

</script>


@endsection
