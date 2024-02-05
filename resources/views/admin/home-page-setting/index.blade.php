@extends('admin.layouts.master')

@section('content')
<!-- Main Content -->
<section class="section">
 <div class="section-header">
    <h1>Home Page Settings</h1>
 </div>

 <div class="section-body">
    
  <div class="row">
   <div class="col-12">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-2">
                 <div class="list-group" id="list-tab" role="tablist">

                    <a class="list-group-item list-group-item-action active" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab">Popular Category Section</a>

                    <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab">Product Slider Section One</a>

                    <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab">Product Slider Section Two</a>

                    <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-slider-three" role="tab">Product Slider Section Three</a>

                 </div>
                </div>
                <div class="col-10">
                    <div class="tab-content" id="nav-tabContent">

                        {{-- Popular Category Section --}}
                        @include('admin.home-page-setting.section.popular-category-section')

                        {{-- Product Slider Section One --}}
                        @include('admin.home-page-setting.section.product-slider-section-one')

                        {{-- Product Slider Section Two --}}
                        @include('admin.home-page-setting.section.product-slider-section-two')

                        {{-- Product Slider Section Three --}}
                        @include('admin.home-page-setting.section.product-slider-section-three')

                    </div>
                </div>
            </div>
        </div>
        </div>
   </div>
  </div>
 </div>
</section>

@endsection