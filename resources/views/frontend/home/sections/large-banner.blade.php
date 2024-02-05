<section id="wsus__large_banner">
        <div class="container">
            <div class="row">
                <div class="cl-xl-12">
                    @if ($home_page_banner_section_four->banner_one->status == 1)
                    {{-- <div class="wsus__large_banner_content" style="background: url({{asset($home_page_banner_section_four->banner_one->banner_imag)}});">
                        <div class="wsus__large_banner_content_overlay">
                            <div class="row">
                                <div class="col-xl-6 col-12 col-md-6">
                                    <div class="wsus__large_banner_text">
                                        <h3>This Week's Deal</h3>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem repudiandae in
                                            ipsam
                                            nesciunt.</p>
                                        <a class="shop_btn" href="#">view more</a>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-12 col-md-6">
                                    <div class="wsus__large_banner_text wsus__large_banner_text_right">
                                        <h3>headphones</h3>
                                        <h5>up to 10% off</h5>
                                        <p>Spring's collection has discounted now!</p>
                                        <a class="shop_btn" href="{{route('flash-sale')}}">shop now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                    <a href="{{$home_page_banner_section_four->banner_one->banner_url}}">
                    <img src="{{asset($home_page_banner_section_four->banner_one->banner_image)}}" class="img-fluid" alt=""></a>
                    @endif
                </div>
            </div>
        </div>
    </section>