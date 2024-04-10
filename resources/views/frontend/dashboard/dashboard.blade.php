@extends('frontend.dashboard.layouts.master')

@section('title')
    {{$settings->site_name}} || Dashboard
@endsection

@section('content')
  <section id="wsus__dashboard">
    <div class="container-fluid">
      @include('frontend.dashboard.layouts.sidebar')
      <div class="row">
        <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
          <h3>User Dashboard: </h3>
          <br>
          <div class="dashboard_content">
            <div class="wsus__dashboard">
              <div class="row">
                <div class="col-xl-2 col-6 col-md-4">
                  <a class="wsus__dashboard_item red" href="{{route('user.orders.index')}}">
                    <i class="fas fa-shopping-cart"></i>
                    <p>Total orders</p>
                    <h4 style="color: white">{{ $totalOrder }}</h4>
                  </a>
                </div>
                <div class="col-xl-2 col-6 col-md-4">
                  <a class="wsus__dashboard_item green" href="#">
                    <i class="fas fa-truck-loading"></i>
                    <p>pending orders</p>
                    <h4 style="color: white">{{ $pendingOrder }}</h4>
                  </a>
                </div>
                <div class="col-xl-2 col-6 col-md-4">
                  <a class="wsus__dashboard_item sky" href="#">
                    <i class="far fa-check-square"></i>
                    <p>complete orders</p>
                    <h4 style="color: white">{{ $completeOrder }}</h4>
                  </a>
                </div>
                <div class="col-xl-2 col-6 col-md-4">
                  <a class="wsus__dashboard_item blue" href="{{ route('user.review.index') }}">
                    <i class="fas fa-star"></i>
                    <p>Reviews</p>
                    <h4 style="color: white">{{ $reviews }}</h4>
                  </a>
                </div>
                <div class="col-xl-2 col-6 col-md-4">
                  <a class="wsus__dashboard_item purple" href="{{ route('user.wishlist.index') }}">
                    <i class="fas fa-heart"></i>
                    <p>Wishlist</p>
                    <h4 style="color: white">{{ $wishlist }}</h4>
                  </a>
                </div>
                <div class="col-xl-2 col-6 col-md-4">
                  <a class="wsus__dashboard_item orange" href="{{ route('user.profile') }}">
                    <i class="fas fa-user-shield"></i>
                    <p>profile</p>
                    <h4 style="color: white">-</h4>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection