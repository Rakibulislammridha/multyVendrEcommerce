@extends('admin.layouts.master')

@section('content')
<!-- Main Content -->
<section class="section">
 <div class="section-header">
    <h1>Vendor Profile</h1>
 </div>

 <div class="section-body">
    
  <div class="row">
   <div class="col-12">
    <div class="card">
     <div class="card-header">
       <h4>Update Vendor Profile</h4>
     </div>
     <div class="card-body">
       <form action="{{route('admin.vendor-profile.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Preview</label>
            <br>
            <img width="150px" src="{{asset($profile->banner)}}" alt="">
        </div>
        <div class="form-group">
            <label>Banner</label>
            <input name="banner" type="file" class="form-control">
        </div>
        
        <div class="form-group">
            <label>Shop Name</label>
            <input name="shop_name" value="{{$profile->shop_name}}" type="text" class="form-control">
        </div>
        
        <div class="form-group">
            <label>Phone</label>
            <input name="phone" value="{{$profile->phone}}" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="text" value="{{$profile->email}}" name="email" class="form-control">
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" name="address" value="{{$profile->address}}" class="form-control">
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea name="description" class="summernote">{{$profile->description}}</textarea>
        </div>
        <div class="form-group">
            <label>Facebook</label>
            <input name="fb_link" value="{{$profile->fb_link}}" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label>Twitter</label>
            <input name="tw_link" value="{{$profile->tw_link}}" type="text" class="form-control">
        </div>
        <div class="form-group">
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
</section>
@endsection