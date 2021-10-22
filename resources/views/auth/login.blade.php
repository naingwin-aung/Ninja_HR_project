@extends('layouts.app_plain')
@section('title', 'Login')
@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center" style="height: 100vh">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body px-md-5">
                    <div class="text-center mb-3">
                        <img src="{{asset('images/ninja.jpg')}}" alt="ninja" width="70">
                    </div>
                    <div>
                        <h6>Please Fill the Login Form</h6>
                    </div>
                    <form method="POST" action="{{ route('login') }}" autocomplete="off">
                        @csrf
                        <div class="form-group md-form">
                            <input id="phone materialLoginFormphone" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required>
                            <label for="materialLoginFormphone">Phone</label>

                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group md-form">
                            <input id="password materialLoginFormpassword" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required>
                            <label for="materialLoginFormpassword">Password</label>

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between">
                            <div class="form-check mt-3">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                            <button type="submit" class="btn btn_theme">
                                {{ __('Login') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
