@extends('layouts.client')

@section('content')
    <!-- start content -->
    <div class="content users">
        <!-- start statistics -->
        <div class="statistics">
            <div class="item">
                <div class="top">
                    <div class="number">{{$count}}</div>
                    <i class="fa-solid fa-ranking-star"></i>
                </div>
                <div class="text">{{__('lang.عدد العملاء')}}</div>
            </div>
        </div>
        <!-- end statistics -->

        <!-- start table -->
        <div class="responsive-table">
            <table>
                <thead>
                <tr>
                    <th>#</th>
                    <th>{{__('lang.Name')}}</th>
                    <th>{{__('lang.Confirmed Reservations')}}</th>
                    <th>{{__('lang.Rejected Reservations')}}</th>

{{--                    <th>{{__('lang.Action')}}</th>--}}
                </tr>
                </thead>
                <tbody>
                <input hidden value="{{$i=0}}"/>
                @foreach($clients as $client)

                    <input hidden value="{{$i++}}"/>
                <tr>
                    <td>{{$i}}</td>
                    <td>{{\App\Models\User::where('id',$client->client_id)->first()->name}}</td>
                    <td>{{count(\App\Models\User::where('id',$client->client_id)->first()->reservation->where('status',2))}}</td>
                    <td>{{count(\App\Models\User::where('id',$client->client_id)->first()->reservation->where('status',3))}}</td>

{{--                    <td>--}}
{{--                        <i class="fa-solid fa-pen-to-square"></i>--}}
{{--                        <ul>--}}
{{--                            <li>--}}
{{--                                <a href="#">{{__('lang.حظر')}}</a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a href="#">{{__('lang.تفعيل')}}</a>--}}
{{--                            </li>--}}

{{--                        </ul>--}}
{{--                    </td>--}}
                </tr>
                @endforeach

                </tbody>
            </table>
        </div>
        <!-- end table -->
    </div>
    <!-- end content -->

@endsection


