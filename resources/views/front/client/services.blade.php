@extends('layouts.client')

@section('content')


    <!-- start content -->
    <div class="content">
{{--        <!-- start statistics -->--}}
{{--        <div class="statistics">--}}
{{--            <div class="item">--}}
{{--                <div class="top">--}}
{{--                    <div class="number">73</div>--}}
{{--                    <i class="fa-regular fa-calendar-days"></i>--}}
{{--                </div>--}}
{{--                <div class="text">Lorem ipsum dolor sit amet.</div>--}}
{{--            </div>--}}
{{--            <div class="item">--}}
{{--                <div class="top">--}}
{{--                    <div class="number">73</div>--}}
{{--                    <i class="fa-solid fa-bars"></i>--}}
{{--                </div>--}}
{{--                <div class="text">Lorem ipsum dolor sit amet.</div>--}}
{{--            </div>--}}
{{--            <div class="item">--}}
{{--                <div class="top">--}}
{{--                    <div class="number">73</div>--}}
{{--                    <i class="fa-solid fa-check"></i>--}}
{{--                </div>--}}
{{--                <div class="text">Lorem ipsum dolor sit amet.</div>--}}
{{--            </div>--}}
{{--            <div class="item">--}}
{{--                <div class="top">--}}
{{--                    <div class="number">73</div>--}}
{{--                    <i class="fa-solid fa-xmark"></i>--}}
{{--                </div>--}}
{{--                <div class="text">Lorem ipsum dolor sit amet.</div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <!-- end statistics -->--}}

        <!-- start accordion -->
        <div class="accordion">
            <div class="title">{{__('lang.Services & Departments')}}</div>
            @foreach($categories as $category)
            <div class="item">
                <div class="head">
                    <h3>{{$category->name}}</h3>
                    <div class="icon">
                        <i class="fa-solid fa-angle-down"></i>
                    </div>
                </div>
                <div class="cont">
                    <!-- start services -->
                    <div class="salon-details">
                        <div class="services">
                           @foreach($services->where('category_id',$category->id) as $service)
                                <div class="serve">
                                    <div class="name">{{$service->name}}</div>
                                    <div class="price">
                                        <label for="price_1">{{\App\Models\Sallon_Service::where('sallon_id',$sallon->id)->where('service_id',$service->id)->first()->price}}</label>

                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                    <!-- end services -->
                </div>
            </div>
            @endforeach


        </div>
        <!-- end accordion -->



    </div>
    <!-- end content -->
@endsection
