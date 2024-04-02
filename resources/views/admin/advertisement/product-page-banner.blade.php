<div class="tab-pane fade show" id="list-product" role="tabpanel" aria-labelledby="list-product-list">
    <div class="card border">
        <div class="card-body">
            <form action="{{route('admin.advertisement.product-page-banner')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="">Status</label>
                    <br>
                    <label class="custom-switch mt-2">
                        <input type="checkbox" {{@$productpage_banner_section->banner_one->status == 1 ? 'checked' : '' }} name="status" class="custom-switch-input">
                        <span class="custom-switch-indicator"></span>
                    </label>
                </div>

                <div class="form-group">
                    <img src="{{asset(@$productpage_banner_section->banner_one->banner_image)}}" width="150px" alt="">
                </div>

                <div class="form-group">
                    <label>Banner Image</label>
                    <input type="file" value="" name="banner_image" class="form-control">
                    <input type="hidden" value="{{@$productpage_banner_section->banner_one->banner_image}}" name="banner_old_image" class="form-control">
                </div>

                <div class="form-group">
                    <label>Banner URL</label>
                    <input type="text" value="{{@$productpage_banner_section->banner_one->banner_url}}" name="banner_url" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
