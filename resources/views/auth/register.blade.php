@extends('layouts.app')
@section('content')
    <div class="section" style="padding: 25px;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <h3 class="fw-normal text-center mb-5">Cual es tu correo electronico y contraseña?</h3>
                    <!-- Snippet -->
                    <form method="POST" action="{{ route('register-client') }}">
                        @csrf

                        <div class="form-group">
                            <label for="first_name" class="col-form-label">{{ __('Name') }}</label>
                            <input id="first_name" type="text"
                                class="button-radius form-control @error('first_name') is-invalid @enderror"
                                placeholder="Ingresa tu nombre" name="first_name" value="{{ old('first_name') }}" required
                                autocomplete="first_name" autofocus>

                            @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="last_name" class="col-form-label">{{ __('Apellido') }}</label>
                            <input id="last_name" type="text"
                                class="button-radius form-control @error('last_name') is-invalid @enderror"
                                placeholder="Ingresa tu Apellido" name="last_name" value="{{ old('last_name') }}" required
                                autocomplete="last_name" autofocus>

                            @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-form-label">{{ __('E-Mail Address') }}</label>
                            <input id="email" type="email"
                                class="button-radius form-control @error('email') is-invalid @enderror"
                                placeholder="Ingresa tu correo electronico" name="email" value="{{ old('email') }}"
                                required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-form-label">{{ __('Password') }}</label>

                            <input id="password" type="password"
                                class="button-radius form-control @error('password') is-invalid @enderror"
                                placeholder="Ingresa tu contraseña" name="password" required autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-form-label">{{ __('Confirm Password') }}</label>

                            <input id="password-confirm" type="password" class="button-radius form-control"
                                placeholder="Confirma tu contraseña" name="password_confirmation" required
                                autocomplete="new-password">
                        </div>

                        <div class="form-group">
                            <label for="phone" class="col-form-label">{{ __('Telefono') }}</label>
                            <input id="phone" type="number"
                                class="button-radius form-control @error('phone') is-invalid @enderror"
                                placeholder="Ingresa tu numero de telefono" name="phone" value="{{ old('phone') }}" required
                                autocomplete="phone" autofocus>

                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" class="button button-dark button-md button-radius" style="width: 100%;">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </form>
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
        </div><!-- end container -->
    </div><!-- end row -->
@endsection
