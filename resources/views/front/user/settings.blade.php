@extends('layouts.user')
@section('content')
    <!-- start content -->
    <div class="content setting">
        @include('alerts.success')
        @include('alerts.errors')

        <div class="personal-image">
            <img src="{{$client->photo}}" alt="profile" />
            <form action="{{route('savePhoto')}}" method="post" enctype="multipart/form-data" >

                <input type="file" name="photo"/>
                @csrf
                <button type="submit" class="btn">{{__('lang.Submit')}}</button>
            </form>
        </div>



        <h3>{{__('lang.Information Personaml')}}:</h3>

        <form action="{{route('updateUserInformation')}}" method="post" class="global-form">
            @csrf
            <input hidden name="id" value="{{$client->id}}"/>
            <div>
                <div>
                    <label for="f_name">لينك الدعوة الخاص بك : </label>
                    <input type="text" readonly value="http://127.0.0.1:8000/ar/userAuth/{{$client->code}}"/>
                </div>

            </div>
            <div>
                <div>
                    <label for="f_name">{{__('lang.Name')}} : </label>
                    <input type="text" id="f_name" name="name" value="{{$client->name}}"/>
                </div>
                <div>
                    <label for="l_name">{{__('lang.E-mail')}} : </label>
                    <input type="text" id="l_name" name="email" value="{{$client->email}}" />
                </div>
            </div>

            <div>
                <div>
                    <label for="phone">{{__('lang.Phone')}}: </label>
                    <input type="tel" name="phone" id="phone" value="{{$client->phone}}" />
                </div>
                <div>
                    <label for="copon">{{__('lang.')}}type: </label>
                    <select name="type">

                        <option value="1" @if($client->type == 1) selected @endif>{{__('lang.Male')}}</option>
                        <option value="0" @if($client->type == 0) selected @endif>{{__('lang.Female')}}</option>

                    </select>
                </div>
            </div>
            <div class="btns">
                <button type="submit" class="btn">{{__('lang.Submit')}}</button>

            </div>
        </form>
            <br/>
            <br/>
            <h3>{{__('lang.Update Password')}}</h3>
        <form action="{{route('changePassword')}}" method="post" class="global-form">
            @csrf
            <input hidden name="id" value="{{$client->id}}"/>
            <div>
                <div>
                    <label for="password">{{__('lang.New password')}}: </label>
                    <input type="password" name="password" id="password" />
                </div>
                <div>
                    <label for="password_confirmation">{{__('lang.Confirm New password')}}: </label>
                    <input type="password" name="password_confirmation" id="password_confirmation" />
                </div>

            </div>
            <div class="btns">
                <button type="submit" class="btn">{{__('lang.Submit')}}</button>

            </div>
        </form>


    </div>
    <!-- end content -->
      @endsection


