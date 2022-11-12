@extends('layouts.front')
@section('content')


    @include('alerts.success')
    @include('alerts.errors')
  <!-- Start Sign In -->
  <div class="sign-in">
      @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
    <div class="container">

      <form action="{{route('userLogin')}}" method="POST" class="sign-in-form">
          @csrf
        <input type="text" name="email" placeholder="{{__('lang.Email Or Phone')}}" required>
        <input type="password" name="password" placeholder="{{__('lang.Password')}}" required>
        <div class="group">
{{--          <div class="radio">--}}
{{--            <input type="checkbox" name="remember_me" id="remember-me">--}}
{{--            <label for="remember-me">{{__('lang.Remember Me')}}</label>--}}
{{--          </div>--}}
            <div class="row mb-3">
                <div class="col-md-6 offset-md-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
            </div>
            <span><a href="#">{{__('lang.Forgot Password?')}}</a></span>
        </div>
        <input type="submit" id="submit" value="Sign In">
      </form>
      <form action="{{route('userRegister')}}" method="POST" class="create-account">
          @csrf

          <input hidden name="code" value="{{$code}}"/>
        <h1>{{__('lang.Create Your New Account')}}</h1>
        <div class="part">
          <input type="text" name="name" id="name" value="{{old('name')}}" placeholder="{{__('lang.Name')}}" required>
          <select name="type">
            <option disabled hidden selected>Select</option>
            <option value="Male">Male</option>
            <option value="Famale">Female</option>
          </select>
        </div>
        <div class="part">

            <input type="email" name="email" id="email" value="{{old('email')}}" placeholder="{{__('lang.Email')}}" required>
            <input type="text"  name="phone" id="phone" value="{{old('phone')}}"  placeholder="{{__('lang.Phone')}}" required>
        </div>
        <div class="check">
          <span>{{__('lang.Who Are You?')}}</span>
          <div class="part">
            <div class="client">
              <input type="radio" name="type" id="type" value="0" required>
              <label for="type">{{__('lang.Client')}}</label>
            </div>
            <div class="salon-owner">
              <input type="radio" name="type" id="type" value="1" required>
              <label for="type">{{__('lang.Salon Owner')}}</label>
            </div>
          </div>
        </div>
        <div class="part">
          <input type="password" name="password" id="" placeholder="{{__('lang.Password')}}" required>
          <input type="password" name="password_confirmation" id="" placeholder="{{__('lang.Confirm Password')}}" required>
        </div>
        <div class="radio">
          <input type="checkbox" name="check" id="radio-2" value="1" required>
          <label for="radio-2">{{__('lang.I have read and agree to the Terms and Conditions of Use')}}</label>
        </div>
        <input type="submit" value="{{__('lang.Create Account')}}">
{{--        <p>Or</p>--}}
{{--        <div class="face-gmail">--}}
{{--           <a href="{{url('redirect/facebook')}}">--}}
{{--           --}}
{{--          <div class="face box">--}}
{{--            <img src="{{asset('assets/images/facebook.png')}}" alt="">--}}
{{--            <span>{{__('lang.Log in with Facebook')}}</span>--}}
{{--          </div>--}}
{{--           </a>--}}
{{--          <div class="google box">--}}
{{--            <img src="{{asset('assets/images/google.png')}}" alt="">--}}
{{--            <span>{{__('lang.Log in with Google')}}</span>--}}
{{--          </div>--}}
{{--        </div>--}}
      </form>
    </div>
  </div>
  <!-- End Sign In -->


@endsection
