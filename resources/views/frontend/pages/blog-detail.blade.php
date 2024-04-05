@extends('frontend.layouts.master')

@section('title')
    {{$settings->site_name}} || Blog Deatils
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
                      <h4>blog dtails</h4>
                      <ul>
                          <li><a href="#">blog</a></li>
                          <li><a href="#">blog details</a></li>
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
      BLOGS DETAILS START
  ==============================-->
  <section id="wsus__blog_details">
      <div class="container">
          <div class="row">
              <div class="col-xxl-9 col-xl-8 col-lg-8">
                  <div class="wsus__main_blog">
                      <div class="wsus__main_blog_img">
                          <img src="{{ asset($blog->image) }}" alt="blog" class="img-fluid w-100">
                      </div>
                      <p class="wsus__main_blog_header">
                          <span><i class="fas fa-user-tie"></i> by {{ $blog->user->name }}</span>
                          <span><i class="fal fa-calendar-alt"></i> {{ date('M d Y', strtotime($blog->created_at)) }}</span>
                          <span><i class="fal fa-comment-alt-smile"></i> 0 Comment</span>
                          <span><i class="far fa-eye"></i> 11 Views</span>
                      </p>
                      <div class="wsus__description_area">
                          <h1>{!! $blog->title !!}</h1>
                          {!! $blog->description !!}
                      </div>
                      <div class="wsus__share_blog">
                          <p>share:</p>
                          <ul>
                              <li><a class="facebook" href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}"><i class="fab fa-facebook-f"></i></a></li>
                              <li><a class="twitter" href="https://twitter.com/share?url={{ url()->current() }}&text={{ $blog->title }}"><i class="fab fa-twitter"></i></a></li>
                              <li><a class="linkedin" href="https://www.linkedin.com/shareArticle?url={{ url()->current() }}&title={{ $blog->title }}&summary={{ limitText($blog->description, 50) }}"><i class="fab fa-linkedin-in"></i></a></li>
                          </ul>
                      </div>
                      <div class="wsus__related_post">
                          <div class="row">
                              <div class="col-xl-12">
                                  <h5>related post</h5>
                              </div>
                          </div>
                          <div class="row blog_det_slider">
                              <div class="col-xl-3">
                                  <div class="wsus__single_blog wsus__single_blog_2">
                                      <a class="wsus__blog_img" href="#">
                                          <img src="images/blog_1.jpg" alt="blog" class="img-fluid w-100">
                                      </a>
                                      <div class="wsus__blog_text">
                                          <a class="blog_top red" href="#">women's</a>
                                          <div class="wsus__blog_text_center">
                                              <a href="blog_details.html">New found the women’s shirt for summer
                                                  season</a>
                                              <p class="date">nov 04 2021</p>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-xl-3">
                                  <div class="wsus__single_blog wsus__single_blog_2">
                                      <a class="wsus__blog_img" href="#">
                                          <img src="images/blog_2.jpg" alt="blog" class="img-fluid w-100">
                                      </a>
                                      <div class="wsus__blog_text">
                                          <a class="blog_top blue" href="#">lifestyle</a>
                                          <div class="wsus__blog_text_center">
                                              <a href="blog_details.html">Fusce lacinia arcuet nulla menasious</a>
                                              <p class="date">nov 04 2021</p>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-xl-3">
                                  <div class="wsus__single_blog wsus__single_blog_2">
                                      <a class="wsus__blog_img" href="#">
                                          <img src="images/blog_3.jpg" alt="blog" class="img-fluid w-100">
                                      </a>
                                      <div class="wsus__blog_text">
                                          <a class="blog_top orange" href="#">lifestyle</a>
                                          <div class="wsus__blog_text_center">
                                              <a href="blog_details.html">found the men’s shirt for summer season</a>
                                              <p class="date">nov 04 2021</p>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-xl-3">
                                  <div class="wsus__single_blog wsus__single_blog_2">
                                      <a class="wsus__blog_img" href="#">
                                          <img src="images/blog_4.jpg" alt="blog" class="img-fluid w-100">
                                      </a>
                                      <div class="wsus__blog_text">
                                          <a class="blog_top orange" href="#">fashion</a>
                                          <div class="wsus__blog_text_center">
                                              <a href="blog_details.html">winter collection for women’s</a>
                                              <p class="date">nov 04 2021</p>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-xl-3">
                                  <div class="wsus__single_blog wsus__single_blog_2">
                                      <a class="wsus__blog_img" href="#">
                                          <img src="images/blog_5.jpg" alt="blog" class="img-fluid w-100">
                                      </a>
                                      <div class="wsus__blog_text">
                                          <a class="blog_top red" href="#">lifestyle</a>
                                          <div class="wsus__blog_text_center">
                                              <a href="blog_details.html">Comes a cool blog post with Images</a>
                                              <p class="date">nov 04 2021</p>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="wsus__comment_area">
                          <h4>comment <span>03</span></h4>
                          <div class="wsus__main_comment">
                              <div class="wsus__comment_img">
                                  <img src="images/client_img_1.jpg" alt="user" class="img-fluid w-100">
                              </div>
                              <div class="wsus__comment_text replay">
                                  <h6>Shopnil mahadi <span>09 Jul 2021</span></h6>
                                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate sint
                                      molestiae eos? Officia, fuga eaque.</p>
                                  <a href="#" data-bs-toggle="collapse"
                                      data-bs-target="#flush-collapsetwo3">replay</a>
                                  <div class="accordion accordion-flush" id="accordionFlushExample3">
                                      <div class="accordion-item">
                                          <div id="flush-collapsetwo3" class="accordion-collapse collapse"
                                              aria-labelledby="flush-collapsetwo"
                                              data-bs-parent="#accordionFlushExample">
                                              <div class="accordion-body">
                                                  <form>
                                                      <div class="wsus__riv_edit_single text_area">
                                                          <i class="far fa-edit"></i>
                                                          <textarea cols="3" rows="1"
                                                              placeholder="Your Text"></textarea>
                                                      </div>
                                                      <button type="submit" class="common_btn">submit</button>
                                                  </form>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="wsus__main_comment wsus__com_replay">
                              <div class="wsus__comment_img">
                                  <img src="images/client_img_3.jpg" alt="user" class="img-fluid w-100">
                              </div>
                              <div class="wsus__comment_text replay">
                                  <h6>Smith jhon <span>09 Jul 2021</span></h6>
                                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate sint
                                      molestiae eos? Officia, fuga eaque.</p>
                                  <a href="#" data-bs-toggle="collapse"
                                      data-bs-target="#flush-collapsetwo2">replay</a>
                                  <div class="accordion accordion-flush" id="accordionFlushExample2">
                                      <div class="accordion-item">
                                          <div id="flush-collapsetwo2" class="accordion-collapse collapse"
                                              aria-labelledby="flush-collapsetwo"
                                              data-bs-parent="#accordionFlushExample">
                                              <div class="accordion-body">
                                                  <form>
                                                      <div class="wsus__riv_edit_single text_area">
                                                          <i class="far fa-edit"></i>
                                                          <textarea cols="3" rows="1"
                                                              placeholder="Your Text"></textarea>
                                                      </div>
                                                      <button type="submit" class="common_btn">submit</button>
                                                  </form>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="wsus__main_comment">
                              <div class="wsus__comment_img">
                                  <img src="images/client_img_1.jpg" alt="user" class="img-fluid w-100">
                              </div>
                              <div class="wsus__comment_text replay">
                                  <h6>Smith jhon <span>09 Jul 2021</span></h6>
                                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate sint
                                      molestiae eos? Officia, fuga eaque.</p>
                                  <a href="#" data-bs-toggle="collapse" data-bs-target="#flush-collapsetwo">replay</a>
                                  <div class="accordion accordion-flush" id="accordionFlushExample">
                                      <div class="accordion-item">
                                          <div id="flush-collapsetwo" class="accordion-collapse collapse"
                                              aria-labelledby="flush-collapsetwo"
                                              data-bs-parent="#accordionFlushExample">
                                              <div class="accordion-body">
                                                  <form>
                                                      <div class="wsus__riv_edit_single text_area">
                                                          <i class="far fa-edit"></i>
                                                          <textarea cols="3" rows="1"
                                                              placeholder="Your Text"></textarea>
                                                      </div>
                                                      <button type="submit" class="common_btn">submit</button>
                                                  </form>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div id="pagination">
                              <nav aria-label="Page navigation example">
                                  <ul class="pagination">
                                      <li class="page-item">
                                          <a class="page-link" href="#" aria-label="Previous">
                                              <i class="fas fa-chevron-left"></i>
                                          </a>
                                      </li>
                                      <li class="page-item"><a class="page-link page_active" href="#">1</a></li>
                                      <li class="page-item"><a class="page-link" href="#">2</a></li>
                                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                                      <li class="page-item"><a class="page-link" href="#">4</a></li>
                                      <li class="page-item">
                                          <a class="page-link" href="#" aria-label="Next">
                                              <i class="fas fa-chevron-right"></i>
                                          </a>
                                      </li>
                                  </ul>
                              </nav>
                          </div>
                      </div>
                      <div class="wsus__post_comment">
                          <h4>post a comment</h4>
                          <form action="#">
                              <div class="row">
                                  <div class="col-xl-6">
                                      <div class="wsus__single_com">
                                          <input type="text" placeholder="Name">
                                      </div>
                                  </div>
                                  <div class="col-xl-6">
                                      <div class="wsus__single_com">
                                          <input type="email" placeholder="Email">
                                      </div>
                                  </div>
                                  <div class="col-xl-12">
                                      <div class="wsus__single_com">
                                          <textarea rows="5" placeholder="Your Comment"></textarea>
                                      </div>
                                  </div>
                              </div>
                              <button class="common_btn" type="submit">post comment</button>
                          </form>
                      </div>
                  </div>
              </div>
              <div class="col-xxl-3 col-xl-4 col-lg-4">
                  <div class="wsus__blog_sidebar" id="sticky_sidebar">
                      <div class="wsus__blog_search">
                          <h4>search</h4>
                          <form>
                              <input type="text" placeholder="Search">
                              <button type="submit" class="common_btn"><i class="far fa-search"></i></button>
                          </form>
                      </div>
                      <div class="wsus__blog_category">
                          <h4>Categories</h4>
                          <ul>
                              <li><a href="#">Clothes</a></li>
                              <li><a href="#">Entertainment</a></li>
                              <li><a href="#">Fashion</a></li>
                              <li><a href="#">Lifestyle</a></li>
                              <li><a href="#">Technology</a></li>
                              <li><a href="#">Shoes</a></li>
                              <li><a href="#">electronic</a></li>
                              <li><a href="#">Others</a></li>
                          </ul>
                      </div>
                      <div class="wsus__blog_post">
                          <h4>Popular Post</h4>
                          <div class="wsus__blog_post_single">
                              <a href="#" class="wsus__blog_post_img">
                                  <img src="images/location_1.jpg" alt="blog" class="imgofluid w-100">
                              </a>
                              <div class="wsus__blog_post_text">
                                  <a href="#">One Thing Separates Creators</a>
                                  <p> <span>Jul 29 2021 </span> 2 Comment </p>
                              </div>
                          </div>
                          <div class="wsus__blog_post_single">
                              <a href="#" class="wsus__blog_post_img">
                                  <img src="images/location_2.jpg" alt="blog" class="imgofluid w-100">
                              </a>
                              <div class="wsus__blog_post_text">
                                  <a href="#">One Thing Separates Creators</a>
                                  <p> <span>Jul 29 2021 </span> 2 Comment </p>
                              </div>
                          </div>
                          <div class="wsus__blog_post_single">
                              <a href="#" class="wsus__blog_post_img">
                                  <img src="images/location_3.jpg" alt="blog" class="imgofluid w-100">
                              </a>
                              <div class="wsus__blog_post_text">
                                  <a href="#">One Thing Separates Creators</a>
                                  <p> <span>Jul 29 2021 </span> 2 Comment </p>
                              </div>
                          </div>
                          <div class="wsus__blog_post_single">
                              <a href="#" class="wsus__blog_post_img">
                                  <img src="images/location_4.jpg" alt="blog" class="imgofluid w-100">
                              </a>
                              <div class="wsus__blog_post_text">
                                  <a href="#">One Thing Separates Creators</a>
                                  <p> <span>Jul 29 2021 </span> 2 Comment </p>
                              </div>
                          </div>
                          <div class="wsus__blog_post_single">
                              <a href="#" class="wsus__blog_post_img">
                                  <img src="images/location_2.jpg" alt="blog" class="imgofluid w-100">
                              </a>
                              <div class="wsus__blog_post_text">
                                  <a href="#">One Thing Separates Creators</a>
                                  <p> <span>Jul 29 2021 </span> 2 Comment </p>
                              </div>
                          </div>

                      </div>
                      <div class="wsus__popular_tag">
                          <h4>popular tags</h4>
                          <ul>
                              <li><a href="#">Fashion</a></li>
                              <li><a href="#">Style</a></li>
                              <li><a href="#">Travel</a></li>
                              <li><a href="#">Women</a></li>
                              <li><a href="#">Men</a></li>
                              <li><a href="#">Hobbies</a></li>
                              <li><a href="#">Shopping</a></li>
                              <li><a href="#">Photography</a></li>
                          </ul>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <!--============================
      BLOGS DETAILS END
  ==============================-->
@endsection