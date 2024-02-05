@extends('frontend.dashboard.layouts.master')

@section('title')
    {{$settings->site_name}} || Became A Vendor Today
@endsection

@section('content')
<!--=============================
    DASHBOARD START
==============================-->
<section id="wsus__dashboard">
  <div class="container-fluid">
    @include('frontend.dashboard.layouts.sidebar')

    <div class="row">
     <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
        <div class="dashboard_content mt-2 mt-md-0">
         <h3><i class="far fa-user"></i> Vendor Request</h3>
         <div class="wsus__dashboard_profile">
            <div class="wsus__dash_pro_area">
              {!! @$content->content !!}
            </div>
         </div>
         <div class="wsus__dashboard_profile mt-3">
            <div class="wsus__dash_pro_area">
              <form action="{{route('user.vendor-request.create')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="wsus__dash_pro_single">
                  <i class="fas fa-image" aria-hidden="true"></i>
                  <input type="file" name="shop_image" value="" placeholder="Shop Banner Image" fdprocessedid="n1bj2">
                </div>
                <div class="wsus__dash_pro_single">
                  <i class="fas fa-store" aria-hidden="true"></i>
                  <input type="text" name="shop_name" value="" placeholder="Shop Name" fdprocessedid="n1bj2">
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="wsus__dash_pro_single">
                      <i class="fas fa-envelope" aria-hidden="true"></i>
                      <input type="text" name="shop_email" value="" placeholder="Shop Email" fdprocessedid="n1bj2">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="wsus__dash_pro_single">
                      <i class="fas fa-phone-alt" aria-hidden="true"></i>
                      <input type="text" name="shop_phone" value="" placeholder="Shop Phone Number" fdprocessedid="n1bj2">
                    </div>
                  </div>
                </div>
                <div class="wsus__dash_pro_single">
                  <i class="fas fa-map-marker-alt" aria-hidden="true"></i>
                  <input type="text" name="shop_address" value="" placeholder="Shop Address" fdprocessedid="n1bj2">
                </div>
                <div class="wsus__dash_pro_single">
                  <textarea name="about" id="" placeholder="About Shopo" cols="10" rows="5"></textarea>
                </div>
                <button class="btn btn-primary" type="submit">
                  Submit
                </button>
              </form>
            </div>
         </div>
        </div>
     </div>
    </div>
  </div>
</section>
<!--=============================
    DASHBOARD START
==============================-->
@endsection