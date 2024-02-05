@extends('admin.layouts.master')

@section('content')
<!-- Main Content -->
<section class="section">
 <div class="section-header">
    <h1>Footer</h1>
 </div>

 <div class="section-body">
    
  <div class="row">
   <div class="col-12">
    <div class="card">
     <div class="card-header">
       <h4>Footer Info</h4>

     </div>
     <div class="card-body">
       <form action="{{route('admin.footer-info.update', 1)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <img src="{{asset(@$footerInfo->logo)}}" width="150px" alt="">
            <br>
            <label>Footer Logo</label>
            <input name="logo" type="file" class="form-control">
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Phone</label>
                    <input name="phone" value="{{@$footerInfo->phone}}" type="text" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Email</label>
                    <input name="email" value="{{@$footerInfo->email}}" type="text" class="form-control">
                </div>
            </div>
        </div>

        <div class="form-group">
            <label>Address</label>
            <input name="address" value="{{@$footerInfo->address}}" type="text" class="form-control">
        </div>

        <div class="form-group">
            <label>Copyright</label>
            <input name="copyright" value="{{@$footerInfo->copyright}}" type="text" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
       </form>
     </div>
    </div>
   </div>
  </div>
 </div>

</section>

@endsection