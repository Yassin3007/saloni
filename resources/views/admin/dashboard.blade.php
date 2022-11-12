@extends('layouts.panel')
@section('content')
      <!-- start content -->
      <div class="content">
        <!-- start statistics -->
        <div class="statistics">
          <div class="item">
            <div class="top">
              <div class="number">{{\App\Models\Sallon::where('is_active',0)->count()}}</div>
              <i class="fa-solid fa-ranking-star"></i>
            </div>
            <div class="text">{{__('lang.Join requests')}}</div>
          </div>
          <div class="item">
            <div class="top">
              <div class="number">{{\App\Models\Sallon::where('is_active',1)->count()}}</div>

                <i class="fa-regular fa-file-lines"></i>
            </div>
            <div class="text">{{__('lang.Sallons')}}</div>
          </div>
          <div class="item">
            <div class="top">
              <div class="number">{{\App\Models\Tax::sum('tax')}}</div>
              <i class="fa-solid fa-hand-holding-dollar"></i>
            </div>
            <div class="text">{{__('lang.الارباح')}}</div>
          </div>
          <div class="item">
            <div class="top">
              <div class="number">{{\App\Models\User::where('is_owner',0)->count()}}</div>
                <i class="fa-solid fa-users-line"></i>
            </div>
            <div class="text">{{__('lang.العملاء')}}</div>
          </div>
        </div>
        <!-- end statistics -->

        <!-- start graphs -->
        <div class="graphs">
          <div class="item">
              {!! $chartjs->render() !!}
          </div>
          <div class="item"></div>
        </div>
        <!-- end graphs -->

      </div>
      <!-- end content -->

      @endsection


