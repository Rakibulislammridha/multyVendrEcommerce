@extends('vendor.layouts.master')

@section('title')
    {{$settings->site_name}} || Shop Profile
@endsection

@section('content')
  <!--=============================
    DASHBOARD START
  ==============================-->
  <section id="wsus__dashboard">
    <div class="container-fluid">
        @include('vendor.layouts.sidebar')

      <div class="row">
        <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
          <div class="dashboard_content mt-2 mt-md-0">
            <h3><i class="far fa-user"></i> Shop profile</h3>
            <div class="wsus__dashboard_profile">
              <div class="wsus__dash_pro_area">

    <form action="{{route('vendor.shop-profile.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group wsus__input">
            <label>Preview</label>
            <br>
            <img width="150px" src="{{asset($profile->banner)}}" alt="">
        </div>
        <div class="form-group wsus__input">
            <label>Banner</label>
            <input name="banner" type="file" class="form-control">
        </div>
        
        <div class="form-group wsus__input">
            <label>Shop Name</label>
            <input name="shop_name" value="{{$profile->shop_name}}" type="text" class="form-control">
        </div>
        
        <div class="form-group wsus__input">
            <label>Phone</label>
            <input name="phone" value="{{$profile->phone}}" type="text" class="form-control">
        </div>
        <div class="form-group wsus__input">
            <label>Email</label>
            <input type="text" value="{{$profile->email}}" name="email" class="form-control">
        </div>
        <div class="form-group wsus__input">
            <label>Address</label>
            <input type="text" name="address" value="{{$profile->address}}" class="form-control">
        </div>
        <div class="form-group wsus__input">
            <label>Description</label>
            <textarea name="description" class="summernote">{{$profile->description}}</textarea>
        </div>
        <div class="form-group wsus__input mt-4">
            <label>Facebook</label>
            <input name="fb_link" value="{{$profile->fb_link}}" type="text" class="form-control">
        </div>
        <div class="form-group wsus__input">
            <label>Twitter</label>
            <input name="tw_link" value="{{$profile->tw_link}}" type="text" class="form-control">
        </div>
        <div class="form-group wsus__input">
            <label>Instagram</label>
            <input name="insta_link" value="{{$profile->insta_link}}" type="text" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
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