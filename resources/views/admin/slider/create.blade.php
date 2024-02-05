@extends('admin.layouts.master')

@section('content')
<!-- Main Content -->
<section class="section">
 <div class="section-header">
    <h1>Slider</h1>
 </div>

 <div class="section-body">
    
  <div class="row">
   <div class="col-12">
    <div class="card">
     <div class="card-header">
       <h4>Create Slider</h4>
     </div>
     <div class="card-body">
       <form action="{{route('admin.slider.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Banner</label>
            <input name="banner" type="file" class="form-control">
        </div>
        
        <div class="form-group">
            <label>Type</label>
            <input name="type" value="{{old('type')}}" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label>Title</label>
            <input type="text" value="{{old('title')}}" name="title" class="form-control">
        </div>
        <div class="form-group">
            <label>Starting Price</label>
            <input type="text" name="starting_price" value="{{old('starting_price')}}" class="form-control">
        </div>
        <div class="form-group">
            <label>Button Url</label>
            <input name="btn_url" value="{{old('btn_url')}}" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label>Serial</label>
            <input name="serial" value="{{old('serial')}}" type="text" class="form-control">
        </div>
        <div class="form-group">
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
</section>
@endsection