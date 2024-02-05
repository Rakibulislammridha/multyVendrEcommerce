@extends('frontend.layouts.master')

@section('title')
    {{$settings->site_name}} || Cart Details
@endsection

@section('content')
    <!--============================
        BREADCRUMB START
    ==============================-->
    <section id="wsus__breadcrumb">
        <div class="wsus_breadcrumb_overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h4>cart View</h4>
                        <ul>
                            <li><a href="#">home</a></li>
                            <li><a href="#">peoduct</a></li>
                            <li><a href="#">cart view</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
        BREADCRUMB END
    ==============================-->


    <!--============================
        CART VIEW PAGE START
    ==============================-->
    <section id="wsus__cart_view">
        <div class="container">
            <div class="row">
                <div class="col-xl-9">
                    <div class="wsus__cart_list">
                        <div class="table-responsive">
                            <table>
                                <tbody>
                                    <tr class="d-flex">
                                        <th class="wsus__pro_img">
                                            product item
                                        </th>

                                        <th class="wsus__pro_name">
                                            product details
                                        </th>

                                        <th class="wsus__pro_tk">
                                            unit price
                                        </th>

                                        <th class="wsus__pro_tk">
                                            total price
                                        </th>

                                        <th class="wsus__pro_select">
                                            quantity
                                        </th>

                                        <th class="wsus__pro_icon">
                                            <a href="#" class="common_btn clear_cart">clear cart</a>
                                        </th>
                                    </tr>

                                    @foreach ($cartItems as $item)
                                    <tr class="d-flex">
                                        <td class="wsus__pro_img"><img src="{{asset($item->options->image)}}" alt="product"
                                                class="img-fluid w-100">
                                        </td>

                                        <td class="wsus__pro_name">
                                            <p>{!! $item->name !!}</p>

                                            @foreach ($item->options->variants as $key => $variant)
                                                <span>{{$key}}: {{$variant['name']}} ({{$settings->currency_icon.$variant['price']}})</span>
                                            @endforeach

                                        </td>

                                        <td class="wsus__pro_tk">
                                            <h6>{{$settings->currency_icon.$item->price}}</h6>
                                        </td>

                                        <td class="wsus__pro_tk">
                                            <h6 id="{{$item->rowId}}">{{$settings->currency_icon.($item->price + $item->options->variants_total) * $item->qty}}</h6>
                                        </td>

                                        <td class="wsus__pro_select">
                                            <div class="product_qty_wrapper">
                                                <button class="btn btn-danger product-decrement">-</button>
                                                <input class="product_qty" data-rowid="{{$item->rowId}}" type="text" min="1" max="100" value="{{$item->qty}}" readonly />
                                                <button class="btn btn-success product-increment">+</button>
                                            </d>
                                        </td>

                                        <td class="wsus__pro_icon">
                                            <a href="{{route('cart.remove-product', $item->rowId)}}"><i class="far fa-times"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach

                                    @if (count($cartItems) === 0)
                                        <tr class="d-flex">
                                            <td class="wsus__pro_icon" rowspan="2" style="width: 100%">
                                               <code style="font-size: 30px">Your Cart Is Empty!!</code>
                                            </td>
                                        </tr>
                                    @endif

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="wsus__cart_list_footer_button" id="sticky_sidebar">
                        <h6>total cart</h6>
                        <p>subtotal: <span id="sub_total">{{$settings->currency_icon}}{{getCartTotal()}}</span></p>
                        <p>coupon(-): <span id="discount">{{$settings->currency_icon}}{{getCartDiscount()}}</span></p>
                        <p class="total"><span>total:</span> <span id="cart_total">{{$settings->currency_icon}}{{getMainCartTotal()}}</span></p>

                        <form id="coupon_form">
                            <input name="coupon_code" type="text" value="{{session()->has('coupon') ? session()->get('coupon')['coupon_code'] : ''}}" placeholder="Coupon Code">
                            <button type="submit" class="common_btn">apply</button>
                        </form>
                        <a class="common_btn mt-4 w-100 text-center" href="{{route('user.checkout')}}">checkout</a>
                        <a class="common_btn mt-1 w-100 text-center" href="{{route('home')}}"><i
                                class="fab fa-shopify"></i> keep shopping</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="wsus__single_banner">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    @if ($cart_page_banner_section->banner_one->status == 1)
                    <div class="wsus__single_banner_content">
                        <div class="wsus__single_banner_img">
                            <img src="{{asset($cart_page_banner_section->banner_one->banner_image)}}" alt="banner" class="img-fluid w-100">
                        </div>
                        <div class="wsus__single_banner_text">
                            <h6>sell on <span>35% off</span></h6>
                            <h3>smart watch</h3>
                            <a class="shop_btn" href="{{$cart_page_banner_section->banner_one->banner_url}}">shop now</a>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="col-xl-6 col-lg-6">
                    @if ($cart_page_banner_section->banner_one->status == 1)
                    <div class="wsus__single_banner_content single_banner_2">
                        <div class="wsus__single_banner_img">
                            <img src="{{asset($cart_page_banner_section->banner_two->banner_image)}}" alt="banner" class="img-fluid w-100">
                        </div>
                        <div class="wsus__single_banner_text">
                            <h6>New Collection</h6>
                            <h3>Cosmetics</h3>
                            <a class="shop_btn" href="{{$cart_page_banner_section->banner_two->banner_url}}">shop now</a>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!--============================
          CART VIEW PAGE END
    ==============================-->
@endsection

@push('scripts')
<script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        /** Increment Product Quantity **/
        $('.product-increment').on('click', function(){
            let input = $(this).siblings('.product_qty');
            let quantity = parseInt(input.val()) + 1;
            let rowId = input.data('rowid');
            input.val(quantity);
            
            $.ajax({
                url: "{{route('cart.update-quantity')}}",
                method: 'POST',
                data: {
                    rowId: rowId,
                    quantity: quantity
                },
                success: function(data) {
                    if(data.status === 'success'){
                        let productId = '#'+rowId;
                        let totalAmount = "{{$settings->currency_icon}}"+data.product_total
                        $(productId).text(totalAmount)
                        renderCartSubtotal()
                        calculateCouponDiscount()
                        toastr.success(data.message);
                    } else if(data.status === 'error') {
                        toastr.error(data.message);
                    }
                },
                error: function(data){

                }
            })
        })

        /** Decrement Product Quantity **/
        $('.product-decrement').on('click', function(){
            let input = $(this).siblings('.product_qty');
            let quantity = parseInt(input.val()) - 1;
            let rowId = input.data('rowid');

            if(quantity < 1) {
                quantity = 1;
            }

            input.val(quantity);
            
            $.ajax({
                url: "{{route('cart.update-quantity')}}",
                method: 'POST',
                data: {
                    rowId: rowId,
                    quantity: quantity
                },
                success: function(data) {
                    if(data.status === 'success'){
                        let productId = '#'+rowId;
                        let totalAmount = "{{$settings->currency_icon}}"+data.product_total
                        $(productId).text(totalAmount)

                        renderCartSubtotal();
                        calculateCouponDiscount();

                        toastr.success(data.message);
                    } else if(data.status === 'error') {
                        toastr.error(data.message);
                    }
                },
                error: function(data){

                }
            })
        })

        /** Clear cart **/
        $('.clear_cart').on('click', function(e){
           e.preventDefault();
            Swal.fire({
            title: "Are you sure?",
            text: "This action will clear your cart!!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, clear it!"
            }).then((result) => {
            if (result.isConfirmed) {

                $.ajax({
                    type: 'get',
                    url: "{{route('clear.cart')}}",
                    success: function(data){
                        if(data.status === 'success'){
                            window.location.reload();
                        }
                    },
                    error: function(xhr, status, error){
                        console.log(error)
                    }
                })
          
            }
        });
        })

        /** Get subtotal of cart and put it on dom **/
        function renderCartSubtotal(){
            $.ajax({
                url: "{{route('cart.sidebar-product-total')}}",
                type: 'GET',
                success: function(data) {
                    $('#sub_total').text("{{$settings->currency_icon}}"+data);
                },
                error: function(data) {
                    console.log(data);
                }
            });
        }

        /** apply coupon **/
        $('#coupon_form').on('submit', function(e){
            e.preventDefault();
            let formData = $(this).serialize();

            $.ajax({
                url: "{{route('apply-coupon')}}",
                type: 'GET',
                data: formData,
                success: function(data) {
                    if(data.status === 'error'){
                        toastr.error(data.message)
                    } else if(data.status === 'success'){
                        calculateCouponDiscount();
                        toastr.success(data.message);
                    }
                },
                error: function(data) {
                    console.log(data);
                }
            });
        })

        /** calculate discount amount **/
        function calculateCouponDiscount(){
            $.ajax({
                url: "{{route('coupon-calculation')}}",
                type: 'GET',
                success: function(data) {
                    if(data.status === 'success'){
                        $('#discount').text('{{$settings->currency_icon}}'+data.discount);
                        $('#cart_total').text('{{$settings->currency_icon}}'+data.cart_total);
                    }
                },
                error: function(data) {
                    console.log(data);
                }
            });
        }

    })
</script>
@endpush