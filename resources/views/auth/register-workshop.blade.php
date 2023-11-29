@extends('layouts.app')
@section('content')
    <div class="section" style="padding: 25px;">
        <div class="container d-flex justify-content-center">
            <h2>Registra tu Taller de Mecánica</h2>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <h3 class="fw-normal text-center mb-5">Cual es tu nombre y los datos de tu Taller?</h3>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-7">
                    <form method="POST" action="{{ route('register-workshop') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                {{-- Input de Primer Nomnbre --}}
                                <div class="form-group">
                                    <label for="first_name" class="col-form-label">{{ __('Nombre') }}</label>
                                    <input id="first_name" type="text"
                                        class="button-radius form-control @error('first_name') is-invalid @enderror"
                                        placeholder="Ingresa tu nombre" name="first_name" value="{{ old('first_name') }}"
                                        required autocomplete="first_name" autofocus>

                                    @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                {{-- Input para correo electronico --}}
                                <div class="form-group">
                                    <label for="email" class="col-form-label">{{ __('E-Mail Address') }}</label>
                                    <input id="email" type="email"
                                        class="button-radius form-control @error('email') is-invalid @enderror"
                                        placeholder="Ingresa tu correo electronico" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                {{-- Input para poner la contraseña --}}
                                <div class="form-group">
                                    <label for="password" class="col-form-label">{{ __('Password') }}</label>

                                    <input id="password" type="password"
                                        class="button-radius form-control @error('password') is-invalid @enderror"
                                        placeholder="Ingresa tu contraseña" name="password" required
                                        autocomplete="new-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                {{-- Input para poner el nombre del taller --}}
                                <div class="form-group">
                                    <label for="name" class="col-form-label">{{ __('Nombre Taller') }}</label>
                                    <input id="name" type="text"
                                        class="button-radius form-control @error('name') is-invalid @enderror"
                                        placeholder="Ingresa el nombre de tu taller" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                {{-- Imput para agregar la ciudad --}}
                                <div class="form-group">
                                    <label for="city" class="col-form-label">{{ __('Ciudad') }}</label>
                                    <input id="city" type="text"
                                        class="button-radius form-control @error('city') is-invalid @enderror"
                                        placeholder="Ingresa tu apellido" name="city" value="{{ old('city') }}"
                                        required autocomplete="city" autofocus>

                                    @error('city')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-md-6">
                                {{-- Imput para agregar el apellido --}}
                                <div class="form-group">
                                    <label for="last_name" class="col-form-label">{{ __('Apellido') }}</label>
                                    <input id="last_name" type="text"
                                        class="button-radius form-control @error('last_name') is-invalid @enderror"
                                        placeholder="Ingresa tu apellido" name="last_name" value="{{ old('last_name') }}"
                                        required autocomplete="last_name" autofocus>

                                    @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                {{-- Inputp para poner el numero de telefono --}}
                                <div class="form-group">
                                    <label for="phone" class="col-form-label">{{ __('Telefono') }}</label>
                                    <input id="phone" type="number"
                                        class="button-radius form-control @error('phone') is-invalid @enderror"
                                        placeholder="Ingresa tu numero de telefono" name="phone"
                                        value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                {{-- Input para confimar la contraseña --}}

                                <div class="form-group">
                                    <label for="password-confirm"
                                        class="col-form-label">{{ __('Confirm Password') }}</label>

                                    <input id="password-confirm" type="password" class="button-radius form-control"
                                        placeholder="Confirma tu contraseña" name="password_confirmation" required
                                        autocomplete="new-password">
                                </div>

                                {{-- Inputp para poner el nit --}}
                                <div class="form-group">
                                    <label for="nit" class="col-form-label">{{ __('NIT') }}</label>
                                    <input id="nit" type="number"
                                        class="button-radius form-control @error('nit') is-invalid @enderror"
                                        placeholder="Ingresa tu NIT" name="nit" value="{{ old('nit') }}" required
                                        autocomplete="nit" autofocus>

                                    @error('nit')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                {{-- Imput para agregar la ciudad --}}
                                <div class="form-group">
                                    <label for="address" class="col-form-label">{{ __('Dirección') }}</label>
                                    <input id="address" type="text"
                                        class="button-radius form-control @error('address') is-invalid @enderror"
                                        placeholder="Ingresa tu apellido" name="address" value="{{ old('address') }}"
                                        required autocomplete="address" autofocus>

                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center pt-3">
                            <div class="col-md-6">
                                <div class="form-group text-center">
                                    <button type="submit" class="button button-dark button-md button-radius"
                                        style="width: 100%;">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                                <hr class="my-4">
                                <div class="form-group text-center">
                                    <button type="submit" class="button button-light button-md button-radius mb-1"
                                        style="width: 100%;">
                                        <span class="bi bi-google"></span> Continua con Google
                                    </button>
                                </div>
                                <div class="form-group text-center">
                                    <button type="submit" class="button button-ligth button-md button-radius mb-1"
                                        style="width: 100%;">
                                        <span class="bi bi-facebook"> Continua con Facebook
                                    </button>
                                </div>
                                <!-- end Snippet -->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div><!-- end container -->
    </div><!-- end row -->
@endsection
