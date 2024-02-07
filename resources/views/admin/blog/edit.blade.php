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
       <form action="{{route('admin.blog.update', $blog->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <img src="{{asset(@$blog->image)}}" width="200px" alt="">
            <br>
            <label>Image</label>
            <input name="image" type="file" class="form-control">
        </div>
        
        <div class="form-group">
            <label>Title</label>
            <input name="title" value="{{@$blog->title}}" type="text" class="form-control">
        </div>
        <div class="form-group">
        <label for="inputState">Category</label>
            <select name="category" id="inputState" class="form-control main-category">
            <option value="">Select</option>
            @foreach ($categories as $category)
                <option {{$category->id == $blog->category_id ? 'selected' : '' }} value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea name="description" class="form-control summernote">{!! @$blog->description !!}</textarea>
        </div>
        <div class="form-group">
            <label>Seo Title</label>
            <input name="seo_title" value="{{@$blog->seo_title}}" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label>Seo Description</label>
            <textarea name="seo_description" class="form-control">{!! @$blog->seo_description !!}</textarea>
        </div>
        <div class="form-group">
            <label for="inputState">Status</label>
            <select name="status" id="inputState" class="form-control">
                <option {{@$blog->status == 1 ? 'selected' : ''}} value="1">Active</option>
                <option {{@$blog->status == 0 ? 'selected' : ''}} value="0">Inactive</option>
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