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
       <h4>Update Variant Item</h4>

     </div>
     <div class="card-body">
       <form action="{{route('admin.products-variant-item.update', $variantItem->id)}}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label>Variant Name</label>
            <input name="variant_name" value="{{$variantItem->productVariant->name}}" type="text" class="form-control" readonly>
        </div>

        <div class="form-group">
            <label>Item Name</label>
            <input name="name" value="{{$variantItem->name}}" type="text" class="form-control">
        </div>

        <div class="form-group">
            <label>Price <code>(Set 0 For Make It Free)</code></label>
            <input name="price" value="{{$variantItem->price}}" type="text" class="form-control">
        </div>

        <div class="form-group">
            <label for="inputState">Is Default</label>
            <select name="is_default" id="inputState" class="form-control">
                <option value="">Select</option>
                <option {{$variantItem->is_default == 0 ? 'selected' : ''}} value="0">No</option>
                <option {{$variantItem->is_default == 1 ? 'selected' : ''}} value="1">Yes</option>
            </select>
        </div>

        <div class="form-group">
            <label for="inputState">Status</label>
            <select name="status" id="inputState" class="form-control">
                <option {{$variantItem->status == 1 ? 'selected' : ''}} value="1">Active</option>
                <option {{$variantItem->status == 0 ? 'selected' : ''}} value="0">Inactive</option>
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