@if(Session::has('error'))

    <div class="alert error">{{Session::get('error')}}</div>

@endif
