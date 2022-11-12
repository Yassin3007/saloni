@extends('layouts.demo')
@section('content')

    <!-- Start Landing -->
    <div class="salon-details">
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


                <div class="services">
                    <div class="info">
                        <form action="">
                           <input hidden value="{{$sum= 0}}">
                            @foreach($services as $serve)


                                <div class="serve">
                                <div class="name" >{{\App\Models\Service::where('id',$serve)->first()->name}}</div>
                                <div class="price">
                                    <label for="price_1" > {{ $price= \App\Models\Sallon_Service::where('service_id',$serve)->where('sallon_id',$sallon->id)->first()->price}} </label>

                                </div>
                            </div>
                                <input hidden value="{{$sum = $sum+$price}}">
                            @endforeach


                        </form>
                    </div>
                </div>
                <div class="send">
                    <label for="total">{{__('lang.الاجمالي')}} </label>
                    <input type="text" readonly name="total" id="total" value="{{$sum}}"/>

                </div>


            <div class="information">
                <div class="title">{{__('lang.تاكيد موعد الحجز')}}</div>
                <form action="{{route('confirm_reservation')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="text" hidden name="total" id="total" value="{{$sum}}"/>
                    <input type="text" hidden name="sallon_id" id="total" value="{{$sallon->id}}"/>
                    @foreach($services as $service)
                        <input type="text" hidden name="service[]" id="total" value="{{$service}}"/>
                    @endforeach

                    <div class="info">
                        <div class="name">
                            <label for="date">{{__('lang.date')}}:</label>
                            <input type="date"  name="date" id="date" value="{{ date('Y-m-d') }}" />
                        </div>


                        <div class="time">

                            <label for="time">{{__('lang.time')}}:</label>
                            <select name="time" id="time" >
                                <option selected disabled>{{__('lang.حدد الساعة')}}</option>
                                @for($i = intval($sallon->open_at) ;$i <= intval($sallon->close_at) ;$i++)

                                    <option


                                        @foreach($reservation as $x)
                                            @if(intval($x-> time)  == $i)
                                                        hidden
                                            @endif
                                        @endforeach


                                            value="{{$i}}:00">{{$i}}:00</option>

                                    @endfor



                            </select>
                        </div>



                        <button type="submit">{{__('lang.Save Edits')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Landing -->

    <!-- start salon information -->

    <!-- end salon information -->
@endsection
