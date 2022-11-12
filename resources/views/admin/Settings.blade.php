@extends('layouts.panel')

@section('content')
    <!-- start content -->
    <div class="content setting">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>=>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @include('alerts.success')
        @include('alerts.errors')
        <div class="personal-image">
            <img src="{{$admin->photo}}" alt="profile" />
            <form action="{{route('saveAdminPhoto')}}" method="post" enctype="multipart/form-data" >

                <input type="file" name="photo"/>
                @csrf
                <button type="submit" class="btn">{{__('lang.Submit')}}</button>
            </form>
        </div>

        <h3 class="title">{{__('lang.Information Personaml')}}:</h3>

        <form action="{{route('editAdminInformation')}}" method="post"  class="global-form" enctype="multipart/form-data">
           @csrf
            <div>
                <input name="id" hidden value="{{$admin->id}}"/>
                <div>
                    <label for="f_name"> {{__('lang.Name')}}: </label>
                    <input type="text" id="f_name" value="{{$admin->name}}" name="name" />
                </div>
                <div>
                    <label for="email">{{__('lang.Email')}}: </label>
                    <input type="email" name="email" value="{{$admin->email}}" id="email" />
                </div>
            </div>




            <div class="btns">
                <button type="submit" class="btn">{{__('lang.Submit')}}</button>

            </div>
        </form>
            <br/>
            <br/>
            <h3>{{__('lang.Update Password')}}</h3>
            <form action="{{route('changeAdminPassword')}}" method="post" class="global-form">
                @csrf
                <input hidden name="id" value="{{$admin->id}}"/>
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


        <h3 class="title">{{__('lang.Application Information')}}:</h3>

        <form action="{{route('editApp')}}" method="post" class="global-form">
            @csrf
            <div>
                <div>
                    <label for="f_name">{{__('lang.first level tax')}}: </label>
                    <input type="text" id="f_name" name="tax_1" value="{{$values->tax_1 *100}}" />
                </div>
                <div>
                    <label for="f_name">{{__('lang.second level tax')}}: </label>
                    <input type="text" id="f_name" name="tax_2" value="{{$values->tax_2 *100}}" />
                </div>
                <div>
                    <label for="f_name">{{__('lang.third level tax')}}: </label>
                    <input type="text" id="f_name" name="tax_3" value="{{$values->tax_3 *100}}" />
                </div>
                <div>
                    <label for="f_name">{{__('lang.fourth level tax')}}:</label>
                    <input type="text" id="f_name" name="tax_4" value="{{$values->tax_4 *100}}" />
                </div>
            </div>
            <br/>


            <h3 >{{__('lang.Reservation levels')}}: </h3>
            <br/>

            <div>
                <div>
                    <label for="phone">{{__('lang.level 1')}}: </label>
                    <input type="tel" name="level_1" id="level_1" value="{{$values->level_1 }}" />
                </div>
                <div>
                    <label for="phone">{{__('lang.level 2')}}: </label>
                    <input type="tel" name="level_2" id="level_2" value="{{$values->level_2}}" />
                </div>
                <div>
                    <label for="phone">{{__('lang.level 3')}}: </label>
                    <input type="tel" name="level_3" id="level_3" value="{{$values->level_3}}" />
                </div>
                <div>
                    <label for="phone">{{__('lang.level 4')}}: </label>
                    <input type="tel" name="level_4" id="level_4" value="{{$values->level_4 }}" />
                </div>
            </div>
            <br/>


            <h3 >: {{__('lang.النقاط')}}</h3>
            <br/>

            <div>
                <div>
                    <label for="loyalty">{{__('lang.loyalty points')}}: </label>
                    <input type="tel" name="loyalty" id="loyalty" value="{{$values->loyalty }}" />
                </div>
                <div>
                    <label for="referral">{{__('lang.Referral points')}}: </label>
                    <input type="tel" name="referral" id="referral" value="{{$values->referral}}" />
                </div>

            </div>
            <br/>


            <h3 >{{__('lang.About US and Privacy Policy pages')}}: </h3>
            <br/>
            <div>
                <div>
                    <label for="about">{{__('lang.about us page')}}: </label>
                    <textarea id="about" name="about" >{{$values->about}}</textarea>
                </div>

            </div>
            <div>
                <div>
                    <label for="privacy">{{__('lang.privacy policy page')}}: </label>
                    <textarea id="privacy" name="privacy" >{{$values->privacy}}</textarea>
                </div>

            </div>


            <div class="btns">
                <button type="submit" class="btn">{{__('lang.Submit')}}</button>
            </div>
        </form>
    </div>
    <!-- end content -->
@endsection




