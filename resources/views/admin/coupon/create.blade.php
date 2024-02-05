@extends('admin.layouts.master')

@section('content')
<!-- Main Content -->
<section class="section">
 <div class="section-header">
    <h1>Coupon</h1>
 </div>

 <div class="section-body">
    
  <div class="row">
   <div class="col-12">
    <div class="card">
     <div class="card-header">
       <h4>Create Coupon</h4>

     </div>
     <div class="card-body">
       <form action="{{route('admin.coupons.store')}}" method="POST">
        @csrf

        <div class="form-group">
            <label>Name</label>
            <input name="name" value="" type="text" class="form-control">
        </div>

        <div class="form-group">
            <label>Code</label>
            <input name="code" value="" type="text" class="form-control">
        </div>

        <div class="form-group">
            <label>Quantity</label>
            <input name="quantity" value="" type="text" class="form-control">
        </div>

        <div class="form-group">
            <label>Max Use Per Person</label>
            <input name="max_use" value="" type="text" class="form-control">
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Start Date</label>
                    <input name="start_date" value="" type="text" class="form-control datepicker">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>End Date</label>
                    <input name="end_date" value="" type="text" class="form-control datepicker">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="inputState">Discount Type</label>
                    <select name="discount_type" id="inputState" class="form-control sub-category">
                        <option value="percent">Percentage (%)</option>
                        <option value="amount">Amount ({{$settings->currency_icon}})</option>
                    </select>
                </div>
            </div>

            <div class="col-md-8">
                <div class="form-group">
                    <label>Discount Value</label>
                    <input name="discount" value="" type="text" class="form-control">
                </div>
            </div>
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