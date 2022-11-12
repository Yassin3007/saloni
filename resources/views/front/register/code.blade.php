@extends('layouts.front')

@section('content')

    <!-- Start Landing -->
    <div class="landing">

        <div class="container">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <div class="information">
                <div class="title">تفعيل الايميل </div>
                <form action="{{'confirmCode'}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="info">
                        <div class="name">
                            <input  type="text" hidden name="user_id" value="{{auth()->user()->id}}">
                            <label for="code">الكود:</label>
                            <input type="text" name="code" id="name"  />
                        </div>



                        <button type="submit" class="btn">{{__('lang.Submit')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Landing -->

    <!-- start salon information -->
    <div class="salon-information">
        <div class="information">
            <div class="container">

                </div>
                </div>
                </div>
    <!-- end salon information -->
@endsection
