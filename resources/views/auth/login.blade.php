 @extends('layouts.app')
 @section('content')
     <div class="section" style="padding: 25px;">
         <div class="container">
             <div class="row justify-content-center">
                 <div class="col-md-4">
                     <h3 class="fw-normal text-center mb-5">Cual es tu correo electronico y contraseña?</h3>
                     <!-- Snippet -->
                     <form method="POST" action="{{ route('login') }}">
                         @csrf
                         <div class="form-group">
                             <label for="email" class="col-form-label">{{ __('E-Mail Address') }}</label>
                             <input id="email" type="email" class="button-radius form-control @error('email') is-invalid @enderror"
                                 placeholder="Ingresa tu correo electronico" name="email" value="{{ old('email') }}"
                                 required autocomplete="email" autofocus>
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
                                 placeholder="Ingresa tu contraseña" name="password" required
                                 autocomplete="current-password">
                             @error('password')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                             @enderror
                         </div>

                         <div class="form-group text-center">
                             <button type="submit" class="button button-dark button-md button-radius" style="width: 100%;">
                                 {{ __('Login') }}
                             </button>
                         </div>

                         <div class="form-group text-center">
                             @if (Route::has('password.request'))
                                 <a class="btn" href="{{ route('password.request') }}">
                                     {{ __('Forgot Your Password?') }}
                                 </a>
                             @endif
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
