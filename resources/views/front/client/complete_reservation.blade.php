@extends('layouts.client')

@section('content')
    @include('alerts.success')
    @include('alerts.errors')
    <!-- start content -->
    <div class="content setting">


        <h3>Information Personaml:</h3>

        <form action="{{route('complete_reservation')}}" method="post" class="global-form">
            @csrf
            <input type="text" hidden  name="id" value="{{$id}}" />
            <div>
                <div>
                    <label for="code"> Code: </label>

                    <input type="text" id="code" name="code" value=""/>
                </div>

            </div>

            <div class="btns">
                <button type="submit" class="btn">Apply</button>

            </div>
        </form>



    </div>
    <!-- end content -->
@endsection




