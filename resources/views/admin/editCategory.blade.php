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

        <h3 class="title">{{__('lang.Edit Category')}}:</h3>


            <form action="{{route('updateCategory')}}" method="post" class="global-form">
                @csrf
                <input hidden name="id" value="{{$category->id}}"/>
                <div>
                    <div>
                        <label for="name_ar">: {{__('lang.الاسم باللغة العربية')}}</label>
                        <input type="text" name="name_ar" id="name_ar" value="{{$trans->where('category_id',$category->id)->where('locale','ar')->first()->name}}" />
                    </div>
                    <div>
                        <label for="name_fr">: {{__('lang.الاسم باللغة الفرنسية')}}</label>
                        <input type="text" name="name_fr" id="name_fr" value="{{$trans->where('category_id',$category->id)->where('locale','fr')->first()->name}}" />
                    </div>

                </div>
                <div class="btns">
                    <button type="submit" class="btn">{{__('lang.Submit')}}</button>

                </div>
            </form>
    </div>
    <!-- end content -->
@endsection




