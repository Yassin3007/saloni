@if(Session::has('success'))
    <div class="alert success">{{Session::get('success')}}</div>

@endif
