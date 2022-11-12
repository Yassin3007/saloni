@extends('layouts.panel')

@section('content')
    <!-- start content -->
    <div class="content setting">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>=>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <h3 class="title">{{__('lang.Edit City')}}:</h3>


            <form action="{{route('updateCity')}}" method="post" class="global-form">
                @csrf
                <input hidden name="id" value="{{$city->id}}"/>
                <div>
                    <div>
                        <label for="city_ar">{{__('lang.الاسم باللغة العربية')}}: </label>
                        <input type="text" name="city_ar" id="city_ar" value="{{$trans->where('city_id',$city->id)->where('locale','ar')->first()->name}}" />
                    </div>
                    <div>
                        <label for="city_fr">{{__('lang.الاسم باللغة الفرنسية')}}: </label>
                        <input type="text" name="city_fr" id="city_fr" value="{{$trans->where('city_id',$city->id)->where('locale','fr')->first()->name}}" />
                    </div>

                </div>
                <div class="btns">
                    <button type="submit" class="btn">{{__('lang.Submit')}}</button>

                </div>
            </form>
    </div>
    <!-- end content -->
@endsection




