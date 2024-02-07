@extends('admin.layouts.master')

@section('content')
<!-- Main Content -->
<section class="section">
 <div class="section-header">
    <h1>Blog Category</h1>
 </div>

 <div class="section-body">
    
  <div class="row">
   <div class="col-12">
    <div class="card">
     <div class="card-header">
       <h4>Edit Blog Categories</h4>

     </div>
     <div class="card-body">
       <form action="{{route('admin.blog-category.update', $category->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Name</label>
            <input name="name" value="{{@$category->name}}" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label for="inputState">Status</label>
            <select name="status" id="inputState" class="form-control">
                <option {{@$category->status == 1 ? 'selected' : ''}} value="1">Active</option>
                <option {{@$category->status == 0 ? 'selected' : ''}} value="0">Inactive</option>
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