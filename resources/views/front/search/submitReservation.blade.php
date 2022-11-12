@extends('layouts.front')
@section('content')
    <!-- start content -->
    <div class="content setting">
        @include('alerts.errors')
        @include('alerts.success')
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <h3>{{__('lang.Submit Reservation')}}:</h3>

        <form action="{{route('send_reservation')}}" method="post" class="global-form">
            @csrf
            <div>

                <div>
                    <label for="copon">{{__('lang.Services')}}: </label>
                    <select  >

                        <option value="1" disabled selected hidden>--{{__('lang.services choosen')}}--</option>

                        @foreach($services as $service)
                        <option  disabled>{{ \App\Models\Service::find($service)->name}}</option>


                        @endforeach

                    </select>
                </div>
                <input name="sallon_id" value="{{$sallon->id}}" hidden/>
                @foreach($services as $service)
                    <input name="services[]" value="{{$service}}" hidden/>
                @endforeach

                <div>
                    <label for="total">{{__('lang.total price')}}: </label>
                    <input type="text" readonly id="total" name="total" value="{{$sum}}" />
                </div>
            </div>
            <div>

                <div>
                    <label for="day">{{__('lang.day')}}: </label>
                    <input type="date" name="day" id="day" value="{{old('day')}}" />
                </div>
                <div>
                    <label for="time">{{__('lang.time')}}: </label>
                    <select name="time" id="time">
                        <option  disabled selected hidden>--{{__('lang.choose the time')}}--</option>
                        @for($i = intval($sallon->open_at) ;$i <= intval($sallon->close_at) ;$i++)
                            <option value="{{$i}}:00" @if($i >= intval($sallon->rest_start) && $i < intval($sallon->rest_end))hidden @endif>{{$i}}</option>
                        @endfor

                    </select>
                </div>
                <div>
                    <label for="copon">{{__('lang.Copoun')}} </label>
                    <input type="text"  id="copon" name="copon" placeholder="{{__('lang.ادخل الكوبون اذا كان لديك لتستمتع بخصم علي قيمة الحجز')}}"/>
                </div>
            </div>

            <div class="btns">
                <button type="submit" class="btn">{{__('lang.Submit')}} </button>

            </div>
        </form>

    </div>
    <!-- end content -->
@endsection
