<div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">Stisla</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="dropdown active">
              <a href="{{route('admin.dashboard')}}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
              
            </li>
            <li class="menu-header">Starter</li>

            <li class="dropdown {{setActive([
              'admin.category.*',
              'admin.sub-category.*',
              'admin.child-category.*'
              ])}}">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Manage Categories</span></a>
              <ul class="dropdown-menu">
                <li class="{{setActive(['admin.category.*'])}}"><a class="nav-link" href="{{route('admin.category.index')}}">Category</a></li>
                <li class="{{setActive(['admin.sub-category.*'])}}"><a class="nav-link" href="{{route('admin.sub-category.index')}}">Sub Category</a></li>
                <li class="{{setActive(['admin.child-category.*'])}}"><a class="nav-link" href="{{route('admin.child-category.index')}}">Child Category</a></li>
              </ul>
            </li>

            <li class="dropdown {{setActive([
              'admin.orders.*',
              'admin.pending-order',
              'admin.processed-order',
              'admin.dropped-off-order',
              'admin.shipped-order',
              'admin.out-for-delivery-order',
              'admin.delivered-order',
              'admin.canceled-order'
              ])}}">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Orders</span></a>
              <ul class="dropdown-menu">
                <li class="{{setActive(['admin.orders.*'])}}"><a class="nav-link" href="{{route('admin.orders.index')}}">All Orders</a></li>
                <li class="{{setActive(['admin.pending-order'])}}"><a class="nav-link" href="{{route('admin.pending-order')}}">All Pending Orders</a></li>
                <li class="{{setActive(['admin.processed-order'])}}"><a class="nav-link" href="{{route('admin.processed-order')}}">All Processed Orders</a></li>
                <li class="{{setActive(['admin.dropped-off-order'])}}"><a class="nav-link" href="{{route('admin.dropped-off-order')}}">All Dropped Off Orders</a></li>
                <li class="{{setActive(['admin.shipped-order'])}}"><a class="nav-link" href="{{route('admin.shipped-order')}}">All Shipped Orders</a></li>
                <li class="{{setActive(['admin.out-for-delivery-order'])}}"><a class="nav-link" href="{{route('admin.out-for-delivery-order')}}">All Out For Delivery Orders</a></li>
                <li class="{{setActive(['admin.delivered-order'])}}"><a class="nav-link" href="{{route('admin.delivered-order')}}">All Delivered Orders</a></li>
                <li class="{{setActive(['admin.canceled-order'])}}"><a class="nav-link" href="{{route('admin.canceled-order')}}">All Canceled Orders</a></li>
              </ul>
            </li>

            <li class="{{setActive(['admin.transaction'])}}"><a class="nav-link" href="{{route('admin.transaction')}}"><i class="far fa-square"></i> <span>Transactions</span></a></li>

            <li class="dropdown {{setActive([
              'admin.brand.*',
              'admin.products.*',
              'admin.products-image-gallery.*',
              'admin.products-variant.*',
              'admin.products-variant-item.*',
              'admin.seller-products.*',
              'admin.seller-pending-products.*',
              'admin.reviews.*',
            ])}}">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Manage Products</span></a>
              <ul class="dropdown-menu">

                <li class="{{setActive(['admin.brand.*'])}}"><a class="nav-link" href="{{route('admin.brand.index')}}">Brands</a></li>
                <li class="{{setActive([
                  'admin.products.*',
                  'admin.products-image-gallery.*',
                  'admin.products-variant.*',
                  'admin.products-variant-item.*',
                ])}}"><a class="nav-link" href="{{route('admin.products.index')}}">Products</a></li>
                <li class="{{setActive(['admin.seller-products.*'])}}"><a class="nav-link" href="{{route('admin.seller-products.index')}}">Seller Products</a></li>
                <li class="{{setActive(['admin.seller-pending-products.*'])}}"><a class="nav-link" href="{{route('admin.seller-pending-products.index')}}">Seller Pending Products</a></li>

                <li class="{{setActive(['admin.reviews.*'])}}"><a class="nav-link" href="{{route('admin.reviews.index')}}">Product Reviews</a></li>

              </ul>
            </li>

            <li class="dropdown {{setActive([
              'admin.vendor-profile.*',
              'admin.flash-sale.*',
              'admin.coupons.*',
              'admin.shipping-rule.*',
              'admin.payment-settings.*',
            ])}}">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Ecommerce</span></a>
              <ul class="dropdown-menu">
                <li class="{{setActive(['admin.vendor-profile.*'])}}"><a class="nav-link" href="{{route('admin.vendor-profile.index')}}">Vendor Profile</a></li>
                <li class="{{setActive(['admin.flash-sale.*'])}}"><a class="nav-link" href="{{route('admin.flash-sale.index')}}">Flash Sale</a></li>
                <li class="{{setActive(['admin.coupons.*'])}}"><a class="nav-link" href="{{route('admin.coupons.index')}}">Cupons</a></li>
                <li class="{{setActive(['admin.shipping-rule.*'])}}"><a class="nav-link" href="{{route('admin.shipping-rule.index')}}">Shipping Rule</a></li>
                <li class="{{setActive(['admin.payment-settings.*'])}}"><a class="nav-link" href="{{route('admin.payment-settings.index')}}">Payment Settings</a></li>

              </ul>
            </li>

            <li class="dropdown {{setActive([
              'admin.slider.*',
              'admin.vendors-condition.index',
              'admin.about.index',
              'admin.terms-conditions.index'
            ])}}">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Manage Website</span></a>
              <ul class="dropdown-menu">
                <li class="{{setActive(['admin.slider.*'])}}"><a class="nav-link" href="{{route('admin.slider.index')}}">Slider</a></li>
                <li class="{{setActive(['admin.slider.*'])}}"><a class="nav-link" href="{{route('admin.home-page-setting.index')}}">Home Page Setting</a></li>
                <li class="{{setActive(['admin.vendors-condition.index'])}}"><a class="nav-link" href="{{route('admin.vendors-condition.index')}}">Vendor Conditions</a></li>
                <li class="{{setActive(['admin.about.index'])}}"><a class="nav-link" href="{{route('admin.about.index')}}">About Page</a></li>
                <li class="{{setActive(['admin.terms-conditions.index'])}}"><a class="nav-link" href="{{route('admin.terms-conditions.index')}}">Terms & Conditions</a></li>
              </ul>
            </li>

            <li class="dropdown {{setActive([
              'admin.footer-info.index',
              'admin.footer-socials.*',
              'admin.footer-grid-two.*',
              'admin.footer-grid-three.*',
            ])}}">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Footer</span></a>
              <ul class="dropdown-menu">
                <li class="{{setActive(['admin.footer-info.index'])}}"><a class="nav-link" href="{{route('admin.footer-info.index')}}">Footer Info</a></li>
                <li class="{{setActive(['admin.footer-socials.*'])}}"><a class="nav-link" href="{{route('admin.footer-socials.index')}}">Footer Social</a></li>
                <li class="{{setActive(['admin.footer-grid-two.*'])}}"><a class="nav-link" href="{{route('admin.footer-grid-two.index')}}">Footer Grid Two</a></li>
                <li class="{{setActive(['admin.footer-grid-three.*'])}}"><a class="nav-link" href="{{route('admin.footer-grid-three.index')}}">Footer Grid Three</a></li>
              </ul>
            </li>

            <li class="dropdown {{setActive([
              'admin.vendors.index',
              'admin.customers.index',
              'admin.vendor-requests.index',
              'admin.manage-users.index',
              'admin.admin-list.index'
            ])}}">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Users</span></a>
              <ul class="dropdown-menu">
                <li class="{{setActive(['admin.vendors.index'])}}"><a class="nav-link" href="{{route('admin.vendors.index')}}">Vendors</a></li>
                <li class="{{setActive(['admin.customers.index'])}}"><a class="nav-link" href="{{route('admin.customers.index')}}">Customer</a></li>
                <li class="{{setActive(['admin.vendor-requests.index'])}}"><a class="nav-link" href="{{route('admin.vendor-requests.index')}}">Pedning Vendors</a></li>
                <li class="{{setActive(['admin.admin-list.index'])}}"><a class="nav-link" href="{{route('admin.admin-list.index')}}">Admin List</a></li>
                <li class="{{setActive(['admin.manage-users.index'])}}"><a class="nav-link" href="{{route('admin.manage-users.index')}}">Manage Users</a></li>
              </ul>
            </li>

            <li><a class="nav-link {{setActive(['admin.advertisement.*'])}}" href="{{route('admin.advertisement.index')}}"><i class="far fa-square"></i> <span>Advertisement</span></a></li>

            <li><a class="nav-link {{setActive(['admin.subscriber.index'])}}" href="{{route('admin.subscriber.index')}}"><i class="far fa-square"></i> <span>Subscribeers</span></a></li>

            <li><a class="nav-link" href="{{route('admin.settings.index')}}"><i class="far fa-square"></i> <span>Seetings</span></a></li>

          </ul>
       
        </aside>
</div>