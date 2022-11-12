@extends('layouts.panel')

@section('content')
    <!-- start content -->
    <div class="content">
        <!-- start statistics -->
        <div class="statistics">
            <div class="item">
                <div class="top">
                    <div class="number">{{\App\Models\User::where('is_owner',1)->count()}}</div>
                    <i class="fa-regular fa-calendar-days"></i>
                </div>
                <div class="text">{{__('lang.صاحب صالون')}}</div>
            </div>
            <div class="item">
                <div class="top">
                    <div class="number">{{\App\Models\User::where('is_owner',0)->count()}}</div>
                    <i class="fa-solid fa-bars"></i>
                </div>
                <div class="text">{{__('lang.عميل')}}</div>
            </div>
            <div class="item" hidden>
                <div class="top">
                    <div class="number">73</div>
                    <i class="fa-solid fa-check"></i>
                </div>
                <div class="text">Lorem ipsum dolor sit amet.</div>
            </div>
            <div class="item" hidden>
                <div class="top">
                    <div class="number">73</div>
                    <i class="fa-solid fa-xmark"></i>
                </div>
                <div class="text">Lorem ipsum dolor sit amet.</div>
            </div>
        </div>
        <!-- end statistics -->

        <!-- start table -->
        <div class="responsive-table">
            <table>
                <thead>
                <tr>
                    <th>#</th>
                    <th>{{__('lang.الاسم')}} </th>
                    <th>{{__('lang.البريد الالكتروني')}} </th>
                    <th>{{__('lang.النوع')}}</th>

                    <th>{{__('lang.الحالة')}}</th>
                    <th>{{__('lang.العمليات')}}</th>
                </tr>
                </thead>
                <tbody>
                <input hidden value="{{$i=0}}">
                @foreach($users as $user)
                    <input hidden value="{{$i++}}">
                <tr>
                    <td>{{$i}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        @if($user->is_owner ==0)
                            {{__('lang.عميل')}}
                            @else
                            {{__('lang.صاحب صالون')}}
                        @endif

                    </td>
                    <td>@if($user->is_active == 0)
                            {{__('lang.غير مفعل')}}
                        @else
                            {{__('lang.مفعل')}}
                        @endif

                    </td>

                    <td>
                        <i class="fa-solid fa-pen-to-square"></i>
                        <ul>
                            <li>
                                <a href="{{route('activeUser',$user->id)}}">{{__('lang.تفعيل')}}</a>
                            </li>
                            <li>
                                <a href="{{route('disableUser',$user->id)}}">{{__('lang.تعطيل')}}</a>
                            </li>

                        </ul>
                    </td>
                </tr>
                @endforeach

                </tbody>
            </table>
        </div>
        <!-- end table -->
    </div>
    <!-- end content -->

@endsection

