@extends('layouts.front')

@section('content')

    <!-- Start Landing -->
    <div >
        <div class="container">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

        </div>
    </div>
    <!-- End Landing -->

    <!-- start salon information -->


        <!-- start salon information -->
        <div class="salon-information">
            <form action="{{route('addSalonInformation')}}" method="POST" name="information" id="information" enctype="multipart/form-data">
                @csrf
            <div class="information">
                <div class="container">
                    <div class="title">{{__('lang.Salon Information')}}</div>

                    <div class="info">



                        <div class="name">
                            <label for="name">{{__('lang.Name')}}:</label>
                            <input type="text" id="name" name="sallon_name" value="{{old('sallon_name')}}" />

                        </div>

                        <div class="phone_number">
                            <label for="phone_number">{{__('lang.Phone')}}:</label>
                            <input type="text" id="phone_number"  name="phone_number" value="{{old('phone_number')}}"/>
                        </div>
                        <div class="city">
                            <label for="city">{{__('lang.City')}}:</label>
                            <select name="city" id="city" >
                                @foreach($cities as $city)
                                    <option


                                        value="{{$city->id}}"    >{{$city->name}}</option>
                                @endforeach

                            </select>
                        </div>

                        <div class="address">
                            <label for="address">{{__('lang.address')}}:</label>
                            <input type="text" id="address"  name="address" value="{{old('address')}}"/>
                        </div>

                        <div class="address">
                            <label for="address">:{{__('lang.عقد الايجار')}}</label>
                            <input type="file" id="address"  name="rent_contract"  value="{{old('rent_contract')}}"/>
                        </div>

                        <div class="address">
                            <label for="address">{{__('lang.السجل التجارى')}}:</label>
                            <input type="file" id="address"  name="commercial_register" {{old('commercial_register')}}}/>
                        </div>



                        <div class="open_at">
                            <label for="open_at">{{__('lang.Open At')}}:</label>
                            <select name="open_at" id="open_at" >
                                <option disabled hidden selected> --{{__('lang.choose the time')}}--</option>
                                @for($i = 0 ;$i <25 ;$i++)
                                    <option  value="{{$i}}:00">{{$i}}:00</option>

                                @endfor



                            </select>
                        </div>
                        <div class="close_at">
                            <label for="close_at">{{__('lang.Close At')}}:</label>
                            <select name="close_at" id="close_at" >
                                <option disabled hidden selected> --{{__('lang.choose the time')}}--</option>
                                @for($i = 0 ;$i <25 ;$i++)
                                    <option  value="{{$i}}:00">{{$i}}:00</option>

                                @endfor



                            </select>
                        </div>



                    </div>



                    <div class="info">
                        <div class="descirption" >
                            <span>{{__('lang.Description')}}: </span>
                            <textarea name="description" form="information"  >{{old('description')}}</textarea>
                        </div>
                    </div>


                    <!-- start salon images -->

                    <!-- end salon images -->

                    <!-- start services -->

                    <button type="submit"  class="btn">{{__('lang.Submit')}}</button>
            </form>
                    <!-- end services -->

    <!-- end salon information -->
@endsection
