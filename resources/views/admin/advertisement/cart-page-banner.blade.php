<div class="tab-pane fade" id="list-cart" role="tabpanel" aria-labelledby="list-cart-list">
    <div class="card border">
        <div class="card-body">
            <form action="{{route('admin.advertisement.cart-page-banner')}}" enctype="multipart/form-data" method="POST">
                @csrf
                @method('PUT')

                <h4>Banner One</h4>
                <div class="form-group">
                    <label for="">Status</label>
                    <br>
                    <label class="custom-switch mt-2">
                        <input type="checkbox" {{@$productpage_banner_section->banner_one->status == 1 ? 'checked' : '' }} name="banner_one_status" class="custom-switch-input">
                        <span class="custom-switch-indicator"></span>
                    </label>
                </div>

                <div class="form-group">
                    <img src="{{asset(@$productpage_banner_section->banner_one->banner_image)}}" width="150px" alt="">
                </div>

                <div class="form-group">
                    <label>Banner Image</label>
                    <input type="file" value="" name="banner_one_image" class="form-control">
                    <input type="hidden" value="{{@$productpage_banner_section->banner_one->banner_image}}" name="banner_one_old_image" class="form-control">
                </div>

                <div class="form-group">
                    <label>Banner URL</label>
                    <input type="text" value="{{@$productpage_banner_section->banner_one->banner_url}}" name="banner_one_url" class="form-control">
                </div>

                <hr>

                <h4>Banner Two</h4>
                <div class="form-group">
                    <label for="">Status</label>
                    <br>
                    <label class="custom-switch mt-2">
                        <input type="checkbox" {{@$productpage_banner_section->banner_two->status == 1 ? 'checked' : '' }} name="banner_two_status" class="custom-switch-input">
                        <span class="custom-switch-indicator"></span>
                    </label>
                </div>

                <div class="form-group">
                    <img src="{{asset(@$productpage_banner_section->banner_two->banner_image)}}" width="150px" alt="">
                </div>

                <div class="form-group">
                    <label>Banner Image</label>
                    <input type="file" value="" name="banner_two_image" class="form-control">
                    <input type="hidden" value="{{@$productpage_banner_section->banner_two->banner_image}}" name="banner_two_old_image" class="form-control">
                </div>

                <div class="form-group">
                    <label>Banner URL</label>
                    <input type="text" value="{{@$productpage_banner_section->banner_two->banner_url}}" name="banner_two_url" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
