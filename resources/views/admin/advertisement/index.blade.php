@extends('admin.layouts.master')

@section('content')
<!-- Main Content -->
<section class="section">
 <div class="section-header">
    <h1>Settings</h1>
 </div>

 <div class="section-body">
    
  <div class="row">
   <div class="col-12">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-2">
                 <div class="list-group" id="list-tab" role="tablist">
                    <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab">Homepage Banner Section One</a>
                    <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab">Homepage Banner Section Two</a>
                    <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab">Homepage Banner Section Three</a>
                    <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab">Homepage Banner Section Four</a>
                    <a class="list-group-item list-group-item-action" id="list-product-list" data-toggle="list" href="#list-product" role="tab">Products Page Banner</a>
                    <a class="list-group-item list-group-item-action" id="list-cart-list" data-toggle="list" href="#list-cart" role="tab">Card Page Banner</a>
                 </div>
                </div>
                <div class="col-10">
                    <div class="tab-content" id="nav-tabContent">
                        {{-- General Setting --}}
                        @include('admin.advertisement.homepage-banner-one')

                        {{-- Email Configuration Setting --}}
                        @include('admin.advertisement.homepage-banner-two')

                        {{-- message Setting --}}
                        @include('admin.advertisement.homepage-banner-three')

                        {{-- message Setting --}}
                        @include('admin.advertisement.homepage-banner-four')

                        {{-- Product banner --}}
                        @include('admin.advertisement.product-page-banner')

                        {{-- Cart banner --}}
                        @include('admin.advertisement.cart-page-banner')
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