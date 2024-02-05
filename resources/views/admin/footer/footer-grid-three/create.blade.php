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
       <form action="{{route('admin.footer-grid-three.store')}}" method="POST">
        @csrf

        <div class="form-group">
            <label>Name</label>
            <input name="name" value="" type="text" class="form-control">
        </div>

        <div class="form-group">
            <label>URL</label>
            <input name="url" value="" type="text" class="form-control">
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