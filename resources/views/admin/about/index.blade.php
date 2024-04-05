@extends('admin.layouts.master')

@section('content')
<!-- Main Content -->
<section class="section">
 <div class="section-header">
    <h1>About</h1>
 </div>

 <div class="section-body">
    
  <div class="row">
   <div class="col-12">
    <div class="card">
     <div class="card-header">
       <h4>Create About Content</h4>

     </div>
     <div class="card-body">
       <form action="{{route('admin.about.update')}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>About Content</label>
            <textarea name="content" class="summernote">{!! @$content->content !!}</textarea>
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