<div class="tab-pane fade show" id="list-razorpay" role="tabpanel" aria-labelledby="list-razorpay-list">
    <div class="card border">
        <div class="card-body">
            <form action="{{route('admin.razorpay-setting.update', 1)}}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Razorpay Status</label>
                    <select name="status" class="form-control">
                        <option {{$razorpaySetting->status == 1 ? 'selected' : ''}} value="1">Enable</option>
                        <option {{$razorpaySetting->status == 0 ? 'selected' : ''}} value="0">Desable</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Country Name</label>
                    <select name="country_name" class="form-control select2" style="width: 100%">
                        <option value="">Select</option>
                        @foreach (config('settings.country_list') as $country)
                        <option {{$country === $razorpaySetting->country_name ? 'selected' : ''}} value="{{$country}}">{{$country}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Currency Name</label>
                    <select name="currency_name" class="form-control select2" style="width: 100%">
                        <option value="">Select</option>
                        @foreach (config('settings.currency_list') as $key => $currency)
                        <option {{$currency === $razorpaySetting->currency_name ? 'selected' : ''}} value="{{$currency}}">{{$key}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Currency Rate (Per {{$settings->currency_name}})</label>
                    <input type="text" value="{{$razorpaySetting->currency_rate}}" name="currency_rate" class="form-control">
                </div>

                <div class="form-group">
                    <label>Razorpay Key</label>
                    <input type="text" value="{{$razorpaySetting->razorpay_key}}" name="razorpay_key" class="form-control">
                </div>

                <div class="form-group">
                    <label>Razorpay Secret Key</label>
                    <input type="text" value="{{$razorpaySetting->razorpay_secret_key}}" name="razorpay_secret_key" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>