@extends('layouts.client')

@section('content')
    <!-- start content -->
    <div class="content">
        <form class="salon-form">
            <div>
                <label for="name">Name</label>
                <input type="text" id="name" />
            </div>
            <div>
                <label for="ville">Ville</label>
                <input type="text" id="ville" />
            </div>
            <div>
                <label for="desc">Description</label>
                <textarea id="desc"></textarea>
            </div>
            <div>
                <label for="services">Services</label>
                <select name="services" id="services" >
                    <optgroup label="select_1">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </optgroup>
                    <optgroup label="select_2">
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                    </optgroup>
                </select>
            </div>
            <div>
                <label for="address">Address</label>
                <input type="text" id="address" />
            </div>
            <div>
                <label for="photos">Photos</label>
                <input type="text" id="photos" />
            </div>
            <div>
                <button type="submit">Submit</button>
                <button type="reset">Reset</button>
            </div>
        </form>
    </div>
    <!-- end content -->

@endsection

