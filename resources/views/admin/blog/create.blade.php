@extends('admin.layouts.master')

@section('content')
<!-- Main Content -->
<section class="section">
 <div class="section-header">
    <h1>Blog</h1>
 </div>

 <div class="section-body">
    
  <div class="row">
   <div class="col-12">
    <div class="card">
     <div class="card-header">
       <h4>Create Blog</h4>
     </div>
     <div class="card-body">
       <form action="{{route('admin.blog.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Image</label>
            <input name="image" type="file" class="form-control">
        </div>
        
        <div class="form-group">
            <label>Title</label>
            <input name="title" value="{{old('title')}}" type="text" class="form-control">
        </div>
        <div class="form-group">
        <label for="inputState">Category</label>
            <select name="category" id="inputState" class="form-control main-category">
            <option value="">Select</option>
            @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea name="description" class="form-control summernote"></textarea>
        </div>
        <div class="form-group">
            <label>Seo Title</label>
            <input name="seo_title" value="{{old('seo_title')}}" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label>Seo Description</label>
            <textarea name="seo_description" class="form-control"></textarea>
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