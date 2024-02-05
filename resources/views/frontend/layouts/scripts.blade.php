    <script>
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            /** Add product into cart **/
            $('.shopping-cart-form').on('submit', function(e){
                e.preventDefault();
                let formData = $(this).serialize();

                $.ajax({
                    url: "{{route('add-to-cart')}}",
                    type: 'POST',
                    data: formData,
                    success: function(data) {
                        if(data.status == 'success'){
                            getCartCount();
                            fetchSidebarCartProducts();
                            $('.mini_cart_actions').removeClass('d-none');
                            toastr.success(data.message);
                        } else if(data.status === 'error') {
                            toastr.error(data.message);
                        }
                    },
                    error: function(data) {
                        
                    }
                });
            })

            function getCartCount(){
                $.ajax({
                    url: "{{route('cart-count')}}",
                    type: 'GET',
                    success: function(data) {
                        $('#cart-count').text(data);
                    },
                    error: function(data) {
                        
                    }
                });
            }

            function fetchSidebarCartProducts(){

                $.ajax({
                    url: "{{route('cart-products')}}",
                    type: 'GET',
                    success: function(data) {
                        console.log(data);
                        $('.mini_cart_wrapper').html("");

                        var html = "";

                        for(let item in data){
                            let product = data[item];

                            html += `
                        <li id="mini_cart_${product.rowId}">
                            <div class="wsus__cart_img">
                                <a href="{{url('product-detail')}}/${product.options.slug}"><img src="{{asset('/')}}${product.options.image}" alt="product" class="img-fluid w-100"></a>
                                <a class="wsis__del_icon remove_sidebar_product" data-id="${product.rowId}" href="#"><i class="fas fa-minus-circle"></i></a>
                            </div>
                            <div class="wsus__cart_text">
                                <a class="wsus__cart_title" href="{{url('product-detail')}}/${product.options.slug}">${product.name}</a>
                                <p>{{$settings->currency_icon}}${product.price}</p>
                                <small>Variants Total: {{$settings->currency_icon}}${product.options.variants_total}</small>
                                <br>
                                <small>Quantity: ${product.qty}</small>
                            </div>
                        </li>`
                        }

                        $('.mini_cart_wrapper').html(html);

                        getSidebarCartSubtotal();

                    },
                    error: function(data) {
                        
                    }
                });
            }

            /** Remove product from sidebar **/
            $('body').on('click', '.remove_sidebar_product', function(e){
                e.preventDefault();
                let rowId = $(this).data('id');
                $.ajax({
                    url: "{{route('cart.remove-sidebar-product')}}",
                    type: 'POST',
                    data: {
                        rowId: rowId
                    },
                    success: function(data) {
                        let productId = '#mini_cart_'+rowId;

                        $(productId).remove();
                        getSidebarCartSubtotal();

                        if($('.mini_cart_wrapper').find('li').length === 0){
                            $('.mini_cart_actions').addClass('d-none');
                            $('.mini_cart_wrapper').html('<li class="text-center"><code> Cart is empty!!</code></li>')
                        }

                        toastr.success(data.message)
                    },
                    error: function(data) {
                        console.log(data)
                    }
                });
                
            })

            /** Get sidebar cart subtotal **/
            function getSidebarCartSubtotal(){
                $.ajax({
                    url: "{{route('cart.sidebar-product-total')}}",
                    type: 'GET',
                    success: function(data) {
                        $('#mini_cart_subtotal').text('{{$settings->currency_icon}}'+data)
                    },
                    error: function(data) {
                        
                    }
                });
            }

            /** Add product to wishlist **/
            $('.add_to_wishlist').on('click', function(e){
                e.preventDefault();
                let id = $(this).data('id');
                
                $.ajax({
                    method: 'GET',
                    url: "{{route('user.wishlist.store')}}",
                    data: {
                        id: id
                    },
                    success: function(data){
                        if(data.status == 'success'){
                            $('#wishlist_count').text(data.count)
                            toastr.success(data.message);
                        } else if(data.status == 'error') {
                            toastr.error(data.message);
                        }
                    },
                    error: function(data){
                        console.log(data);
                    },
                })
            })

            /** News Letter **/
            $('#newsletter').on('submit', function(e){
                e.preventDefault();
                let data = $(this).serialize();

                $.ajax({
                    method: 'POST',
                    url: "{{route('newsletter-request')}}",
                    data: data,
                    beforeSend: function(){
                        $('.subscribe_btn').text('Loading...');
                    },
                    success: function(data){
                        if(data.status === 'success') {
                            $('.subscribe_btn').text('Subscribe');
                            $('.newsletter_email').val('');
                            toastr.success(data.message);
                            
                        } else if(data.status === 'error'){
                            $('.subscribe_btn').text('Subscribe');
                            toastr.success(data.error);
                        }
                    },
                    error: function(data){
                        let errors = data.responseJSON.errors;

                        if(errors){
                            $.each(errors, function(key, value){
                                toastr.error(value);
                            })
                        }
                        $('.subscribe_btn').text('Subscribe');
                    }
                })
            })
        })
    </script>