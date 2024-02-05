@extends('vendor.layouts.master')

@section('title')
    {{$settings->site_name}} || Product Variant
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
         <h3><i class="far fa-user"></i> Create Variants</h3>
         <div class="wsus__dashboard_profile">
            <div class="wsus__dash_pro_area">
              <form action="{{route('vendor.products-variant.store')}}" method="POST">
                @csrf
                <div class="form-group wsus__input">
                    <label>Name</label>
                    <input name="name" value="" type="text" class="form-control">
                </div>
                <div class="form-group wsus__input">
                    <input name="product" value="{{request()->product}}" type="hidden" class="form-control">
                </div>
                <div class="form-group wsus__input">
                    <label for="inputState">Status</label>
                 <select name="status" id="inputState" class="form-control">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                 </select>
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
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