@extends('admin.layouts.master')

@section('content')
<!-- Main Content -->
<section class="section">
 <div class="section-header">
    <h1>Sub Category</h1>
 </div>

 <div class="section-body">
    
  <div class="row">
   <div class="col-12">
    <div class="card">
     <div class="card-header">
       <h4>Create Sub Categories</h4>

     </div>
     <div class="card-body">
       <form action="{{route('admin.sub-category.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="inputState">Category</label>
            <select name="category" id="inputState" class="form-control">
                <option value="">Select</option>
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Name</label>
            <input name="name" value="" type="text" class="form-control">
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