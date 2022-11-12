@extends('layouts.panel')

@section('content')
    <!-- start content -->
    <div class="content">
        <!-- start statistics -->
        <div class="statistics">
            <div class="item">
                <div class="top">
                    <div class="number">{{App\Models\Sallon::where('is_active',0)->count()}}</div>
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
                    <th>{{__('lang.الموقع')}}</th>
                    <th>{{__('lang.عقد الايجار')}}</th>
                    <th>{{__('lang.السجل التجارى')}}</th>
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
                    <td>{{$sallon->address}}</td>
                    <td><a style="color: #007aff" href="{{route('checkContract',$sallon->rent_contract)}}"><img width="250p"  src="{{asset('storage/uploads/sallons/'.$sallon->rent_contract)}}" alt="img" /></a></td>
                    <td><a style="color: #007aff"  href="{{route('checkCommercial',$sallon->commercial_register)}}"><img width="250p"  src="{{asset('storage/uploads/sallons/'.$sallon->commercial_register)}}" alt="img" /></a></td>
                    <td>
                        <i class="fa-solid fa-pen-to-square"></i>
                        <ul>
                            <li>
                                <a href="{{route('activeSallon',$sallon->id)}}">{{__('lang.تفعيل')}}</a>
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

