@extends('layouts.panel')

@section('content')
    <!-- start content -->
    <div class="content">
        <!-- start statistics -->
        <div class="statistics">
            <div class="item">
                <div class="top">
                    <div class="number">{{App\Models\Sallon::where('is_active',1)->count()}}</div>
                    <i class="fa-regular fa-calendar-days"></i>
                </div>
                <div class="text">{{__('lang.طلبات الانضمام')}}</div>
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
                    <th>{{__('lang.اسم الصالون')}}</th>
                    <th>{{__('lang.المدينة')}} </th>
                    <th>{{__('lang.المستوى')}}</th>
                    <th>{{__('lang.الضريبة')}}</th>
                    <th>{{__('lang.الحالة')}}</th>
                    <th>{{__('lang.العمليات')}}</th>
                </tr>
                </thead>
                <tbody>
                <input hidden value="{{$i=0}}">
                @foreach($sallons as $sallon)
                    <input hidden value="{{$i++}}">

                    <tr>
                    <td>{{$i}}</td>
                    <td>{{$sallon->name}}</td>
                    <td>{{$sallon->city->name}}</td>
                    <td>@if($sallon->level ==1 ||$sallon->level == null )
                            {{__('lang.المستوى الاول')}}
                        @elseif($sallon->level ==2 )
                            {{__('lang.المستوى التانى')}}
                        @elseif($sallon->level ==3)
                            {{__('lang.المستوى الثالث')}}
                        @elseif($sallon->level ==4 )
                            {{__('lang.المستوى الرابع')}}
                        @endif

                    </td>
                    <td>
                       {{$sallon->tax->tax}}
                    </td>
                        <td>@if($sallon->is_active == 0)
                                {{__('lang.غير مفعل')}}
                            @else
                                {{__('lang. مفعل')}}
                            @endif

                        </td>
                    <td>
                        <i class="fa-solid fa-pen-to-square"></i>
                        <ul>
                            <li>
                                <a href="{{route('activeSallon',$sallon->id)}}">{{__('lang.تفعيل')}}</a>
                            </li>
                            <li>
                                <a href="{{route('disableSallon',$sallon->id)}}">{{__('lang.تعطيل')}}</a>
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

