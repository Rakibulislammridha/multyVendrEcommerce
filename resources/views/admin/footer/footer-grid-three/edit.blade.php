@extends('admin.layouts.master')

@section('content')
<!-- Main Content -->
<section class="section">
 <div class="section-header">
    <h1>Footer Social</h1>
 </div>

 <div class="section-body">
    
  <div class="row">
   <div class="col-12">
    <div class="card">
     <div class="card-header">
       <h4>Create Footer Item</h4>

     </div>
     <div class="card-body">
       <form action="{{route('admin.footer-grid-three.update', $footer->id)}}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Name</label>
            <input name="name" value="{{$footer->name}}" type="text" class="form-control">
        </div>

        <div class="form-group">
            <label>URL</label>
            <input name="url" value="{{$footer->url}}" type="text" class="form-control">
        </div>

        <div class="form-group">
            <label for="inputState">Status</label>
            <select name="status" id="inputState" class="form-control">
                <option {{$footer->status === 1 ? 'selected' : ''}} value="1">Active</option>
                <option {{$footer->status === 0 ? 'selected' : ''}} value="0">Inactive</option>
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