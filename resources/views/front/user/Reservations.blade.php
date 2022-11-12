@extends('layouts.user')

@section('content')

    <!-- start content -->
    <div class="content">
        @extends('alerts.success')
        @extends('alerts.errors')
        <!-- start statistics -->
        <div class="statistics">

            <div class="item">
                <div class="top">
                    <div class="number">{{App\Models\Reservation::where('status',1)->where('client_id',$user->id)->count()}}</div>
                    <i class="fa-solid fa-bars"></i>
                </div>
                <div class="text">{{__('lang.الحجوزات المؤكدة')}}</div>
            </div>
            <div class="item">
                <div class="top">
                    <div class="number">{{App\Models\Reservation::where('status',2)->where('client_id',$user->id)->count()}}</div>
                    <i class="fa-solid fa-check"></i>
                </div>
                <div class="text">{{__('lang.الحجوزات المكتملة')}}</div>
            </div>
            <div class="item">
                <div class="top">
                    <div class="number">{{App\Models\Reservation::where('status',3)->where('client_id',$user->id)->count()}}</div>
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
                    <th>{{__('lang.Sallon')}}</th>
                    <th>{{__('lang.day')}}</th>
                    <th>{{__('lang.time')}}</th>
                    <th>{{__('lang.Status')}}</th>
                    <th>{{__('lang.Action')}}</th>
                </tr>
                </thead>
                <tbody>
                <input hidden value="{{$i=0}}"/>
                @if(isset($reservations))
                @foreach($reservations as $reservation)
                    <input hidden value="{{$i++}}"/>
                <tr>
                    <td>{{$i}}</td>
                    <td>{{$reservation->sallon->name}}</td>
                    <td>{{$reservation->date}}</td>
                    <td>{{$reservation->time}}</td>
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
                    <td>
                        <i class="fa-solid fa-pen-to-square"></i>
                        <ul>
                            <li>
                                <a href="{{route('deleteReservation',$reservation->id)}}">{{__('lang.delete')}}</a>
                            </li>

                        </ul>
                    </td>
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

