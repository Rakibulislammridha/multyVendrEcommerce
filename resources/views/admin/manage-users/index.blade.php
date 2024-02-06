@extends('admin.layouts.master')

@section('content')
<!-- Main Content -->
<section class="section">
 <div class="section-header">
    <h1>Manage Users</h1>
 </div>

 <div class="section-body">
    
  <div class="row">
   <div class="col-12">
    <div class="card">
     <div class="card-header">
       <h4>Create User</h4>

     </div>
     <div class="card-body">
       <form action="{{route('admin.manage-users.create')}}" method="POST">
        @csrf
        <div class="form-group">
            <label>Name</label>
            <input name="name" value="" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input name="email" value="" type="text" class="form-control">
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Password</label>
                    <input name="password" value="" type="password" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Confirm Password</label>
                    <input name="password_confirmation" value="" type="password" class="form-control">
                </div>
            </div>
        </div>
        
        <div class="form-group">
            <label for="inputState">Status</label>
            <select name="role" id="inputState" class="form-control">
                <option value="">Select</option>
                <option value="user">User</option>
                <option value="vendor">Vendor</option>
                <option value="admin">Admin</option>
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