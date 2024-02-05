@extends('admin.layouts.master')

@section('content')
<!-- Main Content -->
<section class="section">
 <div class="section-header">
    <h1>Brand</h1>
 </div>

 <div class="section-body">
    
  <div class="row">
   <div class="col-12">
    <div class="card">
     <div class="card-header">
       <h4>Update Brand</h4>
     </div>
     <div class="card-body">
       <form action="{{route('admin.brand.update', $brand->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Preview</label>
            <br>
            <img src="{{asset($brand->logo)}}" width="150px" alt="">
        </div>
        <div class="form-group">
            <label>Logo</label>
            <input name="logo" type="file" class="form-control">
        </div>
        
        <div class="form-group">
            <label>Name</label>
            <input name="name" value="{{$brand->name}}" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label for="inputState">Is Featured</label>
            <select name="is_featured" id="inputState" class="form-control">
                <option value="">Select</option>
                <option {{$brand->is_featured == 1 ? 'selected' : ''}} value="1">Yes</option>
                <option {{$brand->is_featured == 0 ? 'selected' : ''}} value="0">No</option>
            </select>
        </div>
        <div class="form-group">
            <label for="inputState">Status</label>
            <select name="status" id="inputState" class="form-control">
                <option {{$brand->status == 1 ? 'selected' : ''}} value="1">Active</option>
                <option {{$brand->status == 0 ? 'selected' : ''}} value="0">Inactive</option>
            </select>
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