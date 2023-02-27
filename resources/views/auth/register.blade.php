@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center fs-4">{{ __('Utente') }}</div>

                    <div class="card-body py-4 px-0">
                        {{-- FORM DI REGISTRAZIONE --}}
                        <form id="register-form" method="POST" action="{{ route('register') }}">
                            @csrf

                            {{-- UTENTE --}}

                            <div class="px-3 w-75 m-auto ">
                                <div class="form-group row">
                                    <label for="username">{{ __('Nome') }}</label>

                                    <div>
                                        <input id="username" type="text"
                                            class="form-control @error('username') is-invalid @enderror" name="username"
                                            value="{{ old('username') }}"autocomplete="username" autofocus>

                                        @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <span id="invalid-username" class="invalid-feedback" role="alert">
                                            <strong>{{ 'Campo obbligatorio' }}</strong>
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="surname">{{ __('Cognome') }}</label>

                                    <div>
                                        <input id="surname" type="text"
                                            class="form-control @error('surname') is-invalid @enderror" name="surname"
                                            value="{{ old('surname') }}" autocomplete="surname" autofocus>

                                        @error('surname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <span id="invalid-surname" class="invalid-feedback" role="alert">
                                            <strong>{{ 'Campo obbligatorio' }}</strong>
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email">{{ __('E-Mail') }}</label>

                                    <div>
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <span id="invalid-email" class="invalid-feedback" role="alert">
                                            <strong>{{ 'Campo obbligatorio' }}</strong>
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password">{{ __('Password') }}</label>

                                    <div>
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <span id="invalid-password" class="invalid-feedback" role="alert">
                                            <strong>{{ 'La password deve essere almeno di 8 caratteri!' }}</strong>
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password-confirm">{{ __('Conferma Password') }}</label>

                                    <div>
                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password_confirmation" autocomplete="new-password">
                                        <span id="invalid-confirmPassword" class="invalid-feedback" role="alert">
                                            <strong>{{ 'La password di conferma non è uguale, riprova!' }}</strong>
                                        </span>
                                    </div>
                                </div>

                            </div>



                            {{-- RISTORANTE --}}
                            <div class="card-header text-center fs-4 mb-4">{{ __('Ristorante') }}</div>

                            <div class="px-3 my-3 w-75 m-auto">

                                <div class="form-group row">
                                    <label for="name">{{ __('Nome Ristorante') }}</label>

                                    <div>
                                        <input id="name" type="text" class="form-control" name="name"
                                            autocomplete="name">
                                        <span id="invalid-name" class="invalid-feedback" role="alert">
                                            <strong>{{ 'Campo obbligatorio' }}</strong>
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="address">{{ __('Indirizzo') }}</label>

                                    <div>
                                        <input id="address" type="text" class="form-control" name="address"
                                            autocomplete="address" pattern="[a-zA-Z0-9]+[^,!?]*">
                                        <span id="invalid-address" class="invalid-feedback" role="alert">
                                            <strong>{{ 'Campo obbligatorio' }}</strong>
                                        </span>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="vat">{{ __('P.Iva') }}</label>
                                    <div>
                                        <input id="vat" type="text"
                                            class="form-control @error('vat') is-invalid @enderror" name="vat"
                                            maxlength="11" minlength="11" autocomplete="vat">
                                        @error('vat')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <span id="invalid-vat" class="invalid-feedback" role="alert">
                                            <strong>{{ 'Inserisci meglio la partita Iva' }}</strong>
                                        </span>
                                    </div>
                                </div>

                                {{-- QUESTE SONO LE CATEGORIE --}}



                            </div>


                            <div class="card-header text-center fs-5 mb-4 w-100">{{ __('Seleziona categorie:') }}</div>
                            <div class="flex-center">

                                {{-- <div class="pb-3">{{ __('Seleziona categorie:') }}</div> --}}
                                <div class="d-flex flex-wrap m-auto justify-content-center">
                                    @foreach ($categories as $category)
                                        <label class="button-checkbox me-2">
                                            <input type="checkbox" name="categories[]" value="{{ $category->id }} ">
                                            <span class="button-label">{{ $category->name }} </span>
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

    <script>
        const form = document.getElementById('register-form');
        const username = document.getElementById('username');
        const surname = document.getElementById('surname');
        const email = document.getElementById('email');
        const password = document.getElementById('password');
        const passwordConfirm = document.getElementById('password-confirm');
        const name = document.getElementById('name');
        const address = document.getElementById('address');
        const vat = document.getElementById('vat');

        const invalidUsername = document.getElementById('invalid-username');
        const invalidSurname = document.getElementById('invalid-surname');
        const invalidEmail = document.getElementById('invalid-email');
        const invalidPassword = document.getElementById('invalid-password');
        const invalidConfirmPassword = document.getElementById('invalid-confirmPassword');
        const invalidName = document.getElementById('invalid-name');
        const invalidAddress = document.getElementById('invalid-address');
        const invalidVat = document.getElementById('invalid-vat');

        form.addEventListener("submit", function(event) {
            event.preventDefault()
            username.classList.remove('is-invalid')
            surname.classList.remove('is-invalid')
            email.classList.remove('is-invalid')
            password.classList.remove('is-invalid')
            passwordConfirm.classList.remove('is-invalid')
            name.classList.remove('is-invalid')
            address.classList.remove('is-invalid')
            vat.classList.remove('is-invalid')

            invalidUsername.classList.remove('d-block')


            let isInvalid = 0;

            if (username.value.length < 1) {
                invalidUsername.classList.add('d-block')
                username.classList.add("is-invalid")
                isInvalid++;
            } else if (!/^[^0-9]*$/.test(username.value)) {
                invalidUsername.textContent = "L'username non può contenere numeri.";
                invalidUsername.classList.add("d-block");
                username.classList.add("is-invalid");
                isInvalid++;
            } else {
                invalidUsername.classList.remove("d-block");
                username.classList.remove("is-invalid");
            }

            if (surname.value.length < 1) {
                invalidSurname.classList.add('d-block')
                surname.classList.add("is-invalid")
                isInvalid++;
            } else if (!/^[^0-9]*$/.test(surname.value)) {
                invalidSurname.textContent = "il cognome non può contenere numeri.";
                invalidSurname.classList.add("d-block");
                surname.classList.add("is-invalid");
                isInvalid++;
            } else {
                invalidSurname.classList.remove("d-block");
                surname.classList.remove("is-invalid");
            }

            if (email.value.length < 1) {
                invalidEmail.classList.add('d-block')
                email.classList.add("is-invalid")
                isInvalid++;
            }

            if (password.value.length < 8) {
                password.classList.add("is-invalid")
                isInvalid++;
            } else if (password.value !== passwordConfirm.value) {
                passwordConfirm.classList.add("is-invalid")
                isInvalid++;
            }

            if (name.value.length < 1) {
                invalidName.classList.add('d-block')
                name.classList.add("is-invalid")
                isInvalid++;
            }
            if (address.value.length < 1) {
                invalidAddress.classList.add('d-block')
                address.classList.add("is-invalid")
                isInvalid++;
            }
            if (vat.value.length < 11) {
                invalidVat.classList.add('d-block')
                vat.classList.add("is-invalid")
                isInvalid++;
            }

            if (isInvalid === 0) {
                form.submit()
            }
        })
    </script>
@endsection
