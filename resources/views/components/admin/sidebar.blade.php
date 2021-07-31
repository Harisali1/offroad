<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">
    <div class="slimscroll-menu">
        <!--- Sidemenu navbar -->
        <div id="sidebar-menu">
            <ul class="metismenu" id="side-menu">
                <li class="menu-title">Navigation</li>
                <li>
                    <a href="{{route('admin.dashboard')}}">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span> Dashboard </span>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);">
                        <i class="fab fa-product-hunt"></i>
                        <span> Products </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="javascript:void(0);">Product</a></li>
                        <li><a href="{{route('admin.addon.index')}}">Addons</a></li>
                        <li><a href="{{ route('admin.category.index') }}">Categories</a></li>
                        <li><a href="{{ route('admin.brand.index') }}">Brands</a></li>
                        <li><a href="{{route('admin.smart_assistant.index')}}">Smart Assistant</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{route('admin.attribute.index')}}">
                        <i class="fas fa-random"></i>
                        <span> Attributes </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{route('admin.attribute.index')}}">Attributes</a></li>
                        <li><a href="{{route('admin.make.index')}}">Make</a></li>
                        <li><a href="{{route('admin.model.index')}}">Model</a></li>
                        <li><a href="{{route('admin.year.index')}}">Year</a></li>
                        <li><a href="{{route('admin.mileage.index')}}">Mileage</a></li>
                        <li><a href="{{route('admin.color.index')}}">Color</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);">
                        <i class="far fa-calendar-alt"></i>
                        <span> Booking Calendar </span>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);">
                        <i class="far fa-clock"></i>
                        <span> Time Slot </span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.coupon.index')}}">
                        <i class="fas fa-money-check"></i>
                        <span>Coupon</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.page.index') }}">
                        <i class="fas fa-file-word"></i>
                        <span> Pages </span>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);">
                        <i class="mdi mdi-chart-donut-variant"></i>
                        <span> Booking / Sales

                            <span class="badge badge-danger rounded-circle noti-icon-badge">9</span>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.customer.index') }}">
                        <i class="fas fa-users"></i>
                        <span> Customer </span>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);">
                        <i class="fab fa-intercom"></i>
                        <span> Appearance </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="javascript:void(0);">
                                <span> Menu Setting </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('admin.admin.index') }}">
                        <i class="fas fa-user-shield"></i>
                        <span> Admin Management </span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-file" aria-hidden="true"></i>
                        <span> Reports </span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- End Sidebar -->
        <div class="clearfix"></div>
    </div>
    <!-- Sidebar -left -->
</div>
<!-- Left Sidebar End -->
