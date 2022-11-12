@extends('layouts.panel')

@section('content')


    <!-- start content -->
    <div class="content copons">
        <!-- start statistics -->
        <div class="statistics">
            <div class="item">
                <div class="top">
                    <div class="number">{{App\Models\Category::count()}}</div>
                    <i class="fa-solid fa-ranking-star"></i>
                </div>
                <div class="text">{{__('lang.الاقسام')}} </div>
            </div>
            <div class="item" hidden>
                <div class="top">
                    <div class="number">73</div>
                    <i class="fa-solid fa-users-line"></i>
                </div>
                <div class="text">Lorem ipsum dolor sit amet.</div>
            </div>
            <div class="item" hidden>
                <div class="top">
                    <div class="number">73</div>
                    <i class="fa-solid fa-hand-holding-dollar"></i>
                </div>
                <div class="text">Lorem ipsum dolor sit amet.</div>
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
            <button class="add-btn">{{__('lang.Add New Category')}}</button>
            <form action="{{route('add_category')}}" class="global-form" method="post">
                @csrf

                <div>
                    <div>
                        <label for="name_ar">{{__('lang.الاسم باللغة العربية')}}: </label>
                        <input type="text" name="name_ar" id="name_ar" />
                    </div>
                    <div>
                        <label for="name_fr">: {{__('lang.الاسم باللغة الفرنسية')}}</label>
                        <input type="text" name="name_fr" id="name_fr" />
                    </div>
                </div>
                <div>

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
                    <th>{{__('lang.الاسم باللغة العربية')}}</th>
                    <th>{{__('lang.الاسم باللغة الفرنسية')}}</th>

                    <th>{{__('lang.العمليات')}}</th>
                </tr>
                </thead>
                <tbody>
                <input hidden value="{{$i=0}}" />
                @foreach($categories as $category)
                    <input hidden value="{{$i++}}" />
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$category_trans->where('category_id',$category->id)->where('locale','ar')->first()->name }}</td>
                        <td>{{$category_trans->where('category_id',$category->id)->where('locale','fr')->first()->name }}</td>

                        <td>
                            <i class="fa-solid fa-pen-to-square"></i>
                            <ul>
                                <li>
                                    <a href="{{route('editCategory',$category->id)}}">{{__('lang.تعديل')}}</a>
                                </li>
                                <li>
                                    <a href="{{route('deleteCategory',$category->id)}}">{{__('lang.حذف')}}</a>
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
