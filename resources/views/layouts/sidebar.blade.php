<!-- BEGIN: Left Aside -->
<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn"><i class="la la-close"></i></button>
<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">

    <!-- BEGIN: Aside Menu -->
    <div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " m-menu-vertical="1" m-menu-scrollable="0" m-menu-dropdown-timeout="500">
        <ul class="m-menu__nav ">

            <li class="m-menu__item" aria-haspopup="true" sidebar-group="report"><a href="{{ url('/') }}" class="m-menu__link "><span class="m-menu__item-here"></span><i class="m-menu__link-icon flaticon-line-graph"></i><span class="m-menu__link-text">Dashboard</span></a></li>

            <!-- News -->
            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover" sidebar-group="pk"><a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon flaticon-file-1"></i><span class="m-menu__link-text">News</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
                <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item " aria-haspopup="true"><a href="{{ url('/news-category') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">News Category</span></a></li>
                    <li class="m-menu__item " aria-haspopup="true"><a href="{{url('/news')}}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">List All News</span></a></li>
                    </ul>
                </div>
            </li>

            <!-- Product -->
            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover" sidebar-group="pk"><a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon flaticon-file-1"></i><span class="m-menu__link-text">Product</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
                <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item " aria-haspopup="true"><a href="{{url('product')}}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Product</span></a></li>
                        <li class="m-menu__item " aria-haspopup="true"><a href="{{ url('product-brands') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Product Brands</span></a></li>
                    <li class="m-menu__item " aria-haspopup="true"><a href="{{url('product-unit')}}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Product Unit Model</span></a></li>
                    </ul>
                </div>
            </li>

            <!-- Job -->
            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover" sidebar-group="pk"><a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon flaticon-file-1"></i><span class="m-menu__link-text">Job Category</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
                <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item " aria-haspopup="true"><a href="{{url('job-category')}}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Job Category</span></a></li>
                    </ul>
                </div>
            </li>

            <!-- Order -->
            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover" sidebar-group="pk"><a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon flaticon-file-1"></i><span class="m-menu__link-text">Order</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
                <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item " aria-haspopup="true"><a href="{{url('order-product')}}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Order Product</span></a></li>
                        <li class="m-menu__item " aria-haspopup="true"><a href="{{ url('order-job') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Order Job</span></a></li>
                    <li class="m-menu__item " aria-haspopup="true"><a href="{{url('order-rental')}}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Order Rental</span></a></li>
                    </ul>
                </div>
            </li>

            <li class="m-menu__item" aria-haspopup="true" sidebar-group="report"><a href="{{ url('#') }}" class="m-menu__link "><span class="m-menu__item-here"></span><i class="m-menu__link-icon flaticon-line-graph"></i><span class="m-menu__link-text">User</span></a></li>



            <li class="m-menu__item" aria-haspopup="true" sidebar-group="report"><a href="{{url('#')}}" class="m-menu__link "><span class="m-menu__item-here"></span><i class="m-menu__link-icon flaticon-line-graph"></i><span class="m-menu__link-text">Coupon</span></a></li>

            <li class="m-menu__item" aria-haspopup="true" sidebar-group="report"><a href="{{url('#')}}" class="m-menu__link "><span class="m-menu__item-here"></span><i class="m-menu__link-icon flaticon-line-graph"></i><span class="m-menu__link-text">Commision Sales</span></a></li>

            <li class="m-menu__item" aria-haspopup="true" sidebar-group="report"><a href="{{url('#')}}" class="m-menu__link "><span class="m-menu__item-here"></span><i class="m-menu__link-icon flaticon-line-graph"></i><span class="m-menu__link-text">Commision Mechanic</span></a></li>







            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover" sidebar-group="pk" sidebar-group-parent="pk-survey"><a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon flaticon-file-2"></i><span class="m-menu__link-text">Setting</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
                <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">

                                <li class="m-menu__item " aria-haspopup="true" sidebar-group="pk-survey"><a href="{{ url('/roles') }}" class="m-menu__link "><i class="m-menu__link-icon flaticon-file-1"><span></span></i><span class="m-menu__link-text">Role</span></a></li>

                                <li class="m-menu__item " aria-haspopup="true" sidebar-group="pk-survey"><a href="{{ url('/user_dashboard') }}" class="m-menu__link "><i class="m-menu__link-icon flaticon-file-1"><span></span></i><span class="m-menu__link-text">User Dashboard</span></a></li>

                            <li class="m-menu__item " aria-haspopup="true" sidebar-group="pk-survey"><a href="{{ url('#') }}" class="m-menu__link "><i class="m-menu__link-icon flaticon-file-1"><span></span></i><span class="m-menu__link-text">Admin</span></a></li>


                    </ul>
                </div>
            </li>

        </ul>
    </div>

    <!-- END: Aside Menu -->
</div>
<!-- END: Left Aside -->
