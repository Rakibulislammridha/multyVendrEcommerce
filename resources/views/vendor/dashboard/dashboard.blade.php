@extends('vendor.layouts.master')

@section('title')
    {{$settings->site_name}} || Dashboard
@endsection

@section('content')
  <section id="wsus__dashboard">
    <div class="container-fluid">
      @include('vendor.layouts.sidebar')
      <div class="row">
        <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
          <div class="dashboard_content">
            <div class="wsus__dashboard">
              <div class="row">
                <div class="col-xl-2 col-6 col-md-4">
                  <a class="wsus__dashboard_item red" href="{{ route('vendor.orders.index') }}">
                    <i class="fas fa-shopping-cart"></i>
                    <p>Today's orders</p>
                    <h4 style="color: white">{{ $todaysOrder }}</h4>
                  </a>
                </div>
                <div class="col-xl-2 col-6 col-md-4">
                  <a class="wsus__dashboard_item red" href="{{ route('vendor.orders.index') }}">
                    <i class="fas fa-shopping-cart"></i>
                    <p>Td's pending orders</p>
                    <h4 style="color: white">{{ $todaysPendeingOrder }}</h4>
                  </a>
                </div>
                <div class="col-xl-2 col-6 col-md-4">
                  <a class="wsus__dashboard_item purple" href="{{ route('vendor.orders.index') }}">
                    <i class="fas fa-shopping-cart"></i>
                    <p>Total order</p>
                    <h4 style="color: white">{{ $totalOrder }}</h4>
                  </a>
                </div>
                <div class="col-xl-2 col-6 col-md-4">
                  <a class="wsus__dashboard_item purple" href="{{ route('vendor.orders.index') }}">
                    <i class="fas fa-shopping-cart"></i>
                    <p>Total pending order</p>
                    <h4 style="color: white">{{ $totalPendeingOrder }}</h4>
                  </a>
                </div>
                <div class="col-xl-2 col-6 col-md-4">
                  <a class="wsus__dashboard_item purple" href="{{ route('vendor.orders.index') }}">
                    <i class="fas fa-shopping-cart"></i>
                    <p>Total complete order</p>
                    <h4 style="color: white">{{ $totalCompleteOrder }}</h4>
                  </a>
                </div>
                <div class="col-xl-2 col-6 col-md-4">
                  <a class="wsus__dashboard_item purple" href="{{ route('vendor.products.index') }}">
                    <i class="fas fa-shopping-cart"></i>
                    <p>Total products</p>
                    <h4 style="color: white">{{ $totalProducts }}</h4>
                  </a>
                </div>
                <div class="col-xl-2 col-6 col-md-4">
                  <a class="wsus__dashboard_item purple" href="javascript:;">
                    <i class="fas fa-shopping-cart"></i>
                    <p>Today's Earnings</p>
                    <h4 style="color: white">{{ $settings->currency_icon }}{{ $todaysEarnings }}</h4>
                  </a>
                </div>
                <div class="col-xl-2 col-6 col-md-4">
                  <a class="wsus__dashboard_item purple" href="javascript:;">
                    <i class="fas fa-shopping-cart"></i>
                    <p>This Month Earnings</p>
                    <h4 style="color: white">{{ $settings->currency_icon }}{{ $thisMonthEarnings }}</h4>
                  </a>
                </div>
                <div class="col-xl-2 col-6 col-md-4">
                  <a class="wsus__dashboard_item purple" href="javascript:;">
                    <i class="fas fa-shopping-cart"></i>
                    <p>This Year Earnings</p>
                    <h4 style="color: white">{{ $settings->currency_icon }}{{ $thisYearEarnings }}</h4>
                  </a>
                </div>
                <div class="col-xl-2 col-6 col-md-4">
                  <a class="wsus__dashboard_item purple" href="javascript:;">
                    <i class="fas fa-shopping-cart"></i>
                    <p>Total Earnings</p>
                    <h4 style="color: white">{{ $settings->currency_icon }}{{ $totalEarnings }}</h4>
                  </a>
                </div>
                <div class="col-xl-2 col-6 col-md-4">
                  <a class="wsus__dashboard_item sky" href="{{ route('vendor.reviews.index') }}">
                    <i class="fas fa-star"></i>
                    <p>total reviews</p>
                    <h4 style="color: white">{{ $totalReviews }}</h4>
                  </a>
                </div>
                <div class="col-xl-2 col-6 col-md-4">
                  <a class="wsus__dashboard_item orange" href="{{ route("vendor.shop-profile.index") }}">
                    <i class="fas fa-user-shield"></i>
                    <p>shop profile</p>
                    <h4 style="color: white">-</h4>
                  </a>
                </div>
                {{-- <div class="col-xl-2 col-6 col-md-4">
                  <a class="wsus__dashboard_item green" href="dsahboard_download.html">
                    <i class="fal fa-cloud-download"></i>
                    <p>download</p>
                  </a>
                </div>
                <div class="col-xl-2 col-6 col-md-4">
                  <a class="wsus__dashboard_item blue" href="dsahboard_wishlist.html">
                    <i class="far fa-heart"></i>
                    <p>wishlist</p>
                  </a>
                </div> --}}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection