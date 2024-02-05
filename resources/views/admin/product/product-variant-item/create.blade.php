@extends('admin.layouts.master')

@section('content')
<!-- Main Content -->
<section class="section">
 <div class="section-header">
    <h1>Product Variant Items</h1>
 </div>

 <div class="section-body">
    
  <div class="row">
   <div class="col-12">
    <div class="card">
     <div class="card-header">
       <h4>Create Variant Item</h4>

     </div>
     <div class="card-body">
       <form action="{{route('admin.products-variant-item.store')}}" method="POST">
        @csrf
        
        <div class="form-group">
            <label>Variant Name</label>
            <input name="variant_name" value="{{$variant->name}}" type="text" class="form-control" readonly>
        </div>

        <div class="form-group">
            <input name="variant_id" value="{{$variant->id}}" type="hidden" class="form-control">
        </div>

        <div class="form-group">
            <input name="product_id" value="{{$product->id}}" type="hidden" class="form-control">
        </div>

        <div class="form-group">
            <label>Item Name</label>
            <input name="name" value="" type="text" class="form-control">
        </div>

        <div class="form-group">
            <label>Price <code>(Set 0 For Make It Free)</code></label>
            <input name="price" value="" type="text" class="form-control">
        </div>

        <div class="form-group">
            <label for="inputState">Is Default</label>
            <select name="is_default" id="inputState" class="form-control">
                <option value="">Select</option>
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
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