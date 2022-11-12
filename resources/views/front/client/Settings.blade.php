@extends('layouts.client')

@section('content')

    <!-- start content -->
    <div class="content setting">
        @include('alerts.success')
        @include('alerts.errors')

        <div class="personal-image">
            <img src="{{$client->photo}}" alt="profile" />
            <form action="{{route('savePhoto')}}" method="post" enctype="multipart/form-data" >

                <input type="file" name="photo"/>
                @csrf
                <button type="submit" class="btn">{{__('lang.Submit')}}</button>
            </form>
        </div>



        <h3>{{__('lang.Information Personaml')}}:</h3>

        <form action="{{route('updateClientInformation')}}" method="post" class="global-form">
            @csrf
            <input hidden name="id" value="{{$client->id}}"/>

            <div>
                <div>
                    <label for="f_name">لينك الدعوة الخاص بك : </label>
                    <input type="text" readonly value="http://127.0.0.1:8000/ar/userAuth/{{$client->code}}"/>
                </div>

            </div>
            <div>
                <div>
                    <label for="f_name"> {{__('lang.Name')}}: </label>
                    <input type="text" id="f_name" name="name" value="{{$client->name}}"/>
                </div>
                <div>
                    <label for="l_name"> {{__('lang.E-mail')}}: </label>
                    <input type="text" id="l_name" name="email" value="{{$client->email}}" />
                </div>
            </div>

            <div>
                <div>
                    <label for="phone">{{__('lang.Phone')}}: </label>
                    <input type="tel" name="phone" id="phone" value="{{$client->phone}}" />
                </div>
                <div>
                    <label for="copon">{{__('lang.type')}}: </label>
                    <select name="type">

                        <option value="1" @if($client->type == 1) selected @endif>Male</option>
                        <option value="0" @if($client->type == 0) selected @endif>Female</option>

                    </select>
                </div>
            </div>
            <div class="btns">
                <button type="submit" class="btn">{{__('lang.Submit')}}</button>

            </div>
        </form>

        <br/>
        <br/>
        <h3>{{__('lang.Update Password')}}</h3>
        <form action="{{route('changePassword')}}" method="post" class="global-form">
            @csrf
            <input hidden name="id" value="{{$client->id}}"/>
            <div>
                <div>
                    <label for="password">{{__('lang.New password')}}: </label>
                    <input type="password" name="password" id="password" />
                </div>
                <div>
                    <label for="password_confirmation">{{__('lang.Confirm New password')}}: </label>
                    <input type="password" name="password_confirmation" id="password_confirmation" />
                </div>

            </div>
            <div class="btns">
                <button type="submit" class="btn">{{__('lang.Submit')}}</button>

            </div>
        </form>
<br/>
<br/>

        <h3>{{__('lang.Sallon Information')}}:</h3>

        <form action="{{route('updateSallonInformation')}}" method="post" enctype="multipart/form-data" class="global-form">
            @csrf
            <input hidden name="id" value="{{$sallon->id}}"/>
            <div>
                <label for="photos">Photos</label>
                <div class="drop-zone">
                    <input type="file" name="photos[]" multiple />
                </div>
            </div>
            <div>
                <div>
                    <label for="f_name"> {{__('lang.Name')}}: </label>
                    <input type="text" id="f_name" name="name" value="{{$sallon->name}}" />
                </div>
                <div>
                    <label for="copon">{{__('lang.City')}}: </label>
                    <select name="city_id">


                        @foreach($cities as $city)
                        <option value="{{$city->id}}" @if($sallon->city_id == $city->id) selected @endif >{{$city->name}}</option>
                        @endforeach

                    </select>
                </div>
            </div>

            <div>
                <div>
                    <label for="phone">{{__('lang.Phone')}}: </label>
                    <input type="tel" name="phone" id="phone" value="{{$sallon->phone_number}}" />
                </div>
                <div>
                    <label for="address">{{__('lang.Address')}}: </label>
                    <input type="text" name="address" id="address" value="{{$sallon->address}}"/>
                </div>
            </div>
            <div>
                <div>
                    <label for="open_at">{{__('lang.Open At')}}:</label>
                    <select name="open_at" id="open_at" >
                        @for($i = 0 ;$i <25 ;$i++)
                            <option  value="{{$i}}:00" @if(intval($sallon->open_at) == $i) selected @endif>{{$i}}:00</option>

                        @endfor



                    </select>
                </div>
                <div>
                    <label for="close_at">{{__('lang.Close At')}}:</label>
                    <select name="close_at" id="close_at" >

                        @for($i = 0 ;$i <25 ;$i++)
                            <option  value="{{$i}}:00" @if(intval($sallon->close_at) == $i) selected @endif>{{$i}}:00</option>

                        @endfor



                    </select>
                </div>
            </div>
            <div>
                <div>
                    <label for="rest_start">{{__('lang.Rest_start:(Optional)')}}</label>
                    <select name="rest_start" id="rest_start" >
                        <option selected disabled hidden>--{{__('lang.choose the time')}}--</option>
                        @for($i = intval($sallon->open_at) ;$i <= intval($sallon->close_at) ;$i++)
                            <option  value="{{$i}}:00" @if(intval($sallon->rest_start) == $i) selected @endif >{{$i}}:00</option>

                        @endfor



                    </select>
                </div>
                <div>
                    <label for="rest_end">{{__('lang.Rest_End:(Optional)')}}</label>
                    <select name="rest_end" id="rest_end" >
                        <option selected disabled hidden>--{{__('lang.choose the time')}}--</option>
                        @for($i = intval($sallon->open_at) ;$i <= intval($sallon->close_at) ;$i++)
                            <option  value="{{$i}}:00" @if(intval($sallon->rest_end) == $i) selected @endif >{{$i}}:00</option>

                        @endfor



                    </select>
                </div>
            </div>
            <div>
                <div>
                    <label for="description">{{__('lang.Description')}}: </label>
                    <textarea id="description" name="description" >{{$sallon->description}}</textarea>
                </div>
            </div>


            <div class="btns">
                <button type="submit" class="btn">{{__('lang.Submit')}}</button>

            </div>
        </form>

        <!-- start accordion -->
        <form action="{{route('addNewServices')}}" method="post">
            @csrf
            <div class="accordion">
                <div class="title">{{__('lang.Add New Services')}}</div>
                <div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                @foreach($categories as $category)
                    <div class="item">
                        <div class="head">
                            <h3>{{$category->name}}</h3>
                            <div class="icon">
                                <i class="fa-solid fa-angle-down"></i>
                            </div>
                        </div>
                        <div class="cont">
                            <!-- start services -->
                            <div class="salon-details">
                                <div class="services" >
                                    @foreach($category->services as $servcie)
                                       @continue(App\Models\Sallon_Service::where('sallon_id',$sallon->id)->where('service_id',$servcie->id)->first())
                                        <div class="serve" >
                                            <div class="name" >{{$servcie->name}}</div>
                                            <div class="price" >
                                                <label for="price_1" >price</label>
                                                <input type="text" @error($servcie->name) is-invalid @enderror" name="{{str_replace(' ' ,'',$servcie->name)}}" id="price_1" />
                                                @error($servcie->name)
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                                <input type="checkbox"  value="{{$servcie->id}}" name="service[]" id="price_1" />
                                            </div>
                                        </div>
                                    @endforeach




                                </div>
                            </div>
                            <!-- end services -->
                        </div>
                    </div>
                @endforeach

            </div>
            <!-- end accordion -->
            <button type="submit" class="btn">{{__('lang.Submit')}}</button>
        </form>
        <!-- end accordion -->



        <!-- start accordion -->
        <form action="{{route('deleteServices')}}" method="post">
            @csrf
            <div class="accordion">
                <div class="title">{{__('lang.Delete Services')}}</div>
                @foreach($categories as $category)
                    <div class="item">
                        <div class="head">
                            <h3>{{$category->name}}</h3>
                            <div class="icon">
                                <i class="fa-solid fa-angle-down"></i>
                            </div>
                        </div>
                        <div class="cont" >
                            <!-- start services -->
                            <div class="services">
                                <div class="info">
                                    <div class="services-list">
                                        @foreach($services->where('category_id',$category->id) as $service)
                                            <div class="serve">
                                                <input type="checkbox" name="serve[]" id="serve_1" value="{{$service->id}}"/>
                                                <label for="serve_1">{{$service->name}}</label>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                            <!-- end services -->
                        </div>
                    </div>
                @endforeach

            </div>
            <!-- end accordion -->
            <button type="submit" class="btn">{{__('lang.Submit')}}</button>
        </form>
        <!-- end accordion -->

    </div>
    <!-- end content -->
@endsection




