@extends('layouts.panel')

@section('content')
    <!-- start content -->
    <div class="content">
        <!-- start statistics -->
        <div class="statistics">
            <div class="item">
                <div class="top">
                    <div class="number">{{App\Models\Reservation::where('status',0)->count()}}</div>
                    <i class="fa-regular fa-calendar-days"></i>
                </div>
                <div class="text">{{__('lang.طلبات الحجز')}}</div>
            </div>
            <div class="item">
                <div class="top">
                    <div class="number">{{App\Models\Reservation::where('status',1)->count()}}</div>
                    <i class="fa-solid fa-bars"></i>
                </div>
                <div class="text">{{__('lang.الحجوزات المؤكدة')}}</div>
            </div>
            <div class="item">
                <div class="top">
                    <div class="number">{{App\Models\Reservation::where('status',2)->count()}}</div>
                    <i class="fa-solid fa-check"></i>
                </div>
                <div class="text">{{__('lang.الحجوزات المكتملة')}}</div>
            </div>
            <div class="item">
                <div class="top">
                    <div class="number">{{App\Models\Reservation::where('status',3)->count()}}</div>
                    <i class="fa-solid fa-xmark"></i>
                </div>
                <div class="text">{{__('lang.الحجوزات المرفوضة')}}</div>
            </div>
        </div>
        <!-- end statistics -->

        <!-- start table -->
        <div class="responsive-table">
            <table>
                <thead>
                <tr>
                    <th>#</th>
                    <th>{{__('lang.Client')}}</th>
                    <th>{{__('lang.Sallon Name')}}</th>
                    <th>{{__('lang.date')}}</th>
                    <th>{{__('lang.time')}}</th>
                    <th>{{__('lang.Services')}}</th>
                    <th>{{__('lang.cost')}}</th>
                    <th>{{__('lang.Status')}}</th>
{{--                    <th>Action</th>--}}
                </tr>
                </thead>
                <tbody>
                <input hidden value="{{$i=0}}"/>
                @if(isset($reservations))
                    @foreach($reservations as $reservation)
                        <input hidden value="{{$i++}}"/>
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$reservation->client->name}}</td>
                            <td>{{$reservation->sallon->name}}</td>
                            <td>{{$reservation->date}}</td>
                            <td>{{$reservation->time}}</td>
                            <td>
                                <select>
                                    <option value="1" disabled selected hidden>--{{__('lang.الخدمات')}} --</option>
                                    @foreach($reservation->services as $service)
                                        <option value="1" disabled>{{$service->name}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>{{$reservation->price}}</td>
                            <td>
                                @if ($reservation->status == 2)
                                    <span class="text-success">{{__('lang.مكتملة')}}</span>
                                @elseif($reservation->status == 0)
                                    <span class="text-danger">{{__('lang.قيد المراجعة')}}</span>
                                @elseif($reservation->status == 1)
                                    <span class="text-warning">{{__('lang.مؤكدة')}}</span>
                                @elseif($reservation->status == 3)
                                    <span class="text-warning">{{__('lang.مرفوضة')}}</span>
                                @endif

                            </td>
{{--                            <td>--}}
{{--                                <i class="fa-solid fa-pen-to-square"></i>--}}
{{--                                <ul>--}}
{{--                                    <li>--}}
{{--                                        <a href="{{route('accept_reservation',$reservation->id)}}">accept</a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="{{route('verify_reservation',$reservation->id)}}">completed</a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="{{route('refuse_reservation',$reservation->id)}}">refuse</a>--}}
{{--                                    </li>--}}

{{--                                </ul>--}}
{{--                            </td>--}}
                        </tr>
                    @endforeach
                @endif

                </tbody>
            </table>
        </div>
        <!-- end table -->
    </div>
    <!-- end content -->

@endsection

