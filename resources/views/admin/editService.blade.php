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

        <h3 class="title">{{__('lang.تعديل الخدمة')}}:</h3>


            <form action="{{route('updateService')}}" method="post" class="global-form">
                @csrf
                <input hidden name="id" value="{{$service->id}}"/>
                <div>
                    <div>
                        <label for="name_ar">: {{__('lang.الاسم باللغة العربية')}}</label>
                        <input type="text" name="name_ar" id="name_ar" value="{{$trans->where('service_id',$service->id)->where('locale','ar')->first()->name}}" />
                    </div>
                    <div>
                        <label for="name_fr">: {{__('lang.الاسم باللغة الفرنسية')}}</label>
                        <input type="text" name="name_fr" id="name_fr" value="{{$trans->where('service_id',$service->id)->where('locale','fr')->first()->name}}" />
                    </div>
                    <div>
                        <label for="category_id">{{__('lang.category')}}:</label>

                        <select name="category_id">
                            <option  selected hidden disabled>{{__('lang.اختر القسم')}}</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}" @if($service->category_id ==$category->id)selected @endif>{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
                <div class="btns">
                    <button type="submit" class="btn">{{__('lang.Submit')}}</button>

                </div>
            </form>
    </div>
    <!-- end content -->
@endsection




