@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-12 col-md-8 col-lg-7 takeLogin">
      <div class="card login_form">
        <!-- <div class="card-header">{{ __('Login') }}</div> -->

        <div class="card-body">
          <div class="logoCard col-12  animation-element slide-aparece"><img src="{{ asset('images/logotipo.png') }}" alt="" class="img-fluid" width="240"></div>
          <div class="titleLogin col-10 col-md-8  animation-element slide-aparece">Entre com o login e a senha. Em caso de dúvidas entre em contato com a administração!</div>
          <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="takeForm  animation-element slide-aparece">
              <div class="row mb-3 col-10 col-md-8">
                <label for="email" class="col-md-4 col-form-label">{{ __('Email:') }}</label>

                <div class="col-md-12">
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                  @error('email')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>

              <div class="row mb-3 col-10 col-md-8">
                <label for="password" class="col-md-4 col-form-label">{{ __('Senha:') }}</label>

                <div class="col-md-12">
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                  @error('password')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>

              <div class="row mb-3 col-10 col-md-8">
                <div class="col-md-12" style="text-align: left;">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                      {{ __('Lembrar de mim?') }}
                    </label>
                  </div>
                </div>
              </div>

              <div class="row mb-0 col-10 col-md-8">
                <div class="col-12 takeBtn">
                  <button type="submit" class="btn btn-primary btn_default">
                    {{ __('Entrar') }}
                  </button>

                  {{-- @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                  {{ __('Esqueceu sua senha?') }}
                  </a>
                  @endif --}}
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection