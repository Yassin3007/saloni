@extends('layouts.client')
@section('content')


      <!-- start content -->
      <div class="content">
        <!-- start statistics -->
        <div class="statistics">
          <div class="item">
            <div class="top">
              <div class="number">{{\App\Models\Reservation::where('sallon_id',$sallon->id)->count()}}</div>
              <i class="fa-solid fa-ranking-star"></i>
            </div>
            <div class="text">{{__('lang.عدد الحجوزات')}}</div>
          </div>
          <div class="item">
            <div class="top">
              <div class="number">{{$count}}</div>
              <i class="fa-solid fa-users-line"></i>
            </div>
            <div class="text">{{__('lang.عدد العملاء')}}</div>
          </div>
          <div class="item">
            <div class="top">
              <div class="number">{{\App\Models\Reservation::where('sallon_id',$sallon->id)->where('status',2)->sum('price')}}</div>
              <i class="fa-solid fa-hand-holding-dollar"></i>
            </div>
            <div class="text">{{__('lang.الارباح')}}</div>
          </div>
          <div class="item">
            <div class="top">
              <div class="number">{{\App\Models\Tax::where('sallon_id',$sallon->id)->sum('tax')}}</div>
              <i class="fa-regular fa-file-lines"></i>
            </div>
            <div class="text">{{__('lang.اجمالي الضريبة')}}</div>
          </div>
        </div>
        <!-- end statistics -->

{{--        <!-- start graphs -->--}}
{{--        <div class="graphs">--}}
{{--          <div class="item">--}}




{{--          </div>--}}
{{--            <div style="width:75%;">--}}
{{--                {!! $chartjs->render() !!}--}}
{{--            </div>--}}
{{--          <div class="item">--}}



{{--          </div>--}}
{{--        </div>--}}
{{--        <!-- end graphs -->--}}

          <!-- start table -->
          <br/>
          <br/>
          <br/>
          <br/>
          <br/>
          <br/>
          <br/>
{{--          <div class="responsive-table">--}}
{{--              <table>--}}
{{--                  <thead>--}}
{{--                  <tr>--}}
{{--                      <th>{{__('lang.Sallon Name')}}</th>--}}
{{--                      <th>{{__('lang.عدد العملاء')}}</th>--}}
{{--                      <th>{{__('lang.Services')}}</th>--}}

{{--                      <th>{{__('lang.مواعيد العمل')}} </th>--}}
{{--                      <th>{{__('lang.عدد الصور')}}</th>--}}

{{--                  </tr>--}}
{{--                  </thead>--}}
{{--                  <tbody>--}}
{{--                  <tr>--}}
{{--                      <td><a style="color: #007aff" href="{{route('sallon_profile',$sallon->id)}}">{{$sallon->name}}</a></td>--}}
{{--                      <td><a style="color: #007aff" href="{{route('clientUsers')}}">{{$count}}</a></td>--}}
{{--                      <td><a style="color: #007aff" href="{{route('clientServices')}}">{{$service_count}}</a></td>--}}
{{--                      <td> من {{$sallon->open_at}} الي {{$sallon->close_at}} </td>--}}
{{--                      <td>{{$sallon->images->count()}}</td>--}}

{{--                  </tr>--}}

{{--                  </tbody>--}}
{{--              </table>--}}
{{--          </div>--}}
          <!-- end table -->
      </div>
      <!-- end content -->

      @endsection


