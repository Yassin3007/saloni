@extends('layouts.client')

@section('content')
    <!-- start content -->
    <div class="content copons">
        <!-- start statistics -->
        <div class="statistics">
            <div class="item" >
                <div class="top">
                    <div class="number">{{\App\Models\Copoun::where('sallon_id',$sallon->id)->count()}}</div>
                    <i class='fas fa-file-alt'></i>
                </div>
                <div class="text">{{__('lang.عدد الكوبونات')}}</div>
            </div>
            <div class="item">
                <div class="top">
                    <div class="number">{{\App\Models\Copoun::where('sallon_id',$sallon->id)->where('is_active',1)->count()}}</div>
                    <i class="fa fa-check"></i>
                </div>
                <div class="text">{{__('lang.الكوبونات النشطة')}}</div>
            </div>
            <div class="item">
                <div class="top">
                    <div class="number">{{\App\Models\Copoun::where('sallon_id',$sallon->id)->where('is_active',0)->count()}}</div>
                    <i class="fa fa-close"></i>
                </div>
                <div class="text">{{__('lang.الكوبونات الغير نشطة')}}</div>
            </div>

        </div>
        <!-- end statistics -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <!-- start add copon -->
        <div class="add-copon">
            <button class="add-btn">{{__('lang.Add New Coupon')}}</button>
            <form action="{{route('addCopoun')}}" method="post" class="global-form">
                @csrf
                <div>
                    <div>
                        <label for="copon">{{__('lang.Copon')}}: </label>
                        <input type="text" id="copon" name="name" />
                    </div>
                    <div>
                        <label for="discount">{{__('lang.Discount')}}:% </label>
                        <input type="text" id="discount" name="discount" />
                    </div>
                </div>
                <div>
                    <div>
                        <label for="start-date">{{__('lang.Start Date')}}</label>
                        <input type="date" name="start_at" id="start-date" />
                    </div>
                    <div>
                        <label for="end-date">{{__('lang.End Date')}}</label>
                        <input type="date" name="end_at" id="end-date" />
                    </div>
                </div>
                <div>
                    <button type="submit" class="btn">{{__('lang.Submit')}}</button>
                    <button class="btn close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
            </form>
        </div>
        <!-- end add copon -->

        <!-- start table -->
        <div class="responsive-table">
            <table>
                <thead>
                <tr>
                    <th>#</th>
                    <th>{{__('lang.كود الكوبون')}}</th>
                    <th>{{__('lang.نسبة الخصم')}}</th>
                    <th>{{__('lang.عدد المستخدمين')}}</th>
                    <th>{{__('lang.تاريخ البداية')}}</th>
                    <th>{{__('lang.تاريخ الانتهاء')}}</th>
                    <th>{{__('lang.الحالة')}}</th>
                    <th>{{__('lang.العمليات')}}</th>
                </tr>
                </thead>
                <tbody>
                <input hidden value="{{$i=0}}"/>
{{\Carbon\Carbon::now()->toDateString()}}
                @foreach($copouns as $copoun)

                    <input hidden value="{{$i++}}"/>
                <tr>
                    <td>{{$i}}</td>
                    <td>{{$copoun->name}}</td>
                    <td>{{$copoun->discount*100}}%</td>
                    <td>{{$copoun->count}}</td>
                    <td>{{$copoun->start_at}}</td>
                    <td>{{$copoun->end_at}}</td>
                    <td>@if(\Carbon\Carbon::now()->format('Y-m-d') > $copoun->end_at)
                            منتهي الصلاحية

                        @else
                            نشط
                        @endif
                    </td>
                    <td>
                        <i class="fa-solid fa-pen-to-square"></i>
                        <ul>
                            <li>
                                <a href="#">{{__('lang.تعطيل')}}</a>
                            </li>
                            <li>
                                <a href="#">{{__('lang.حذف')}}</a>
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
