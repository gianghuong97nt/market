<div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
    <!--left-fixed -navigation-->
    <aside class="sidebar-left">
        <nav class="navbar navbar-inverse">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".collapse" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <h1><a class="navbar-brand" href="{{url('/home')}}"><span class="fa fa-area-chart"></span> Glance<span class="dashboard_text">Design dashboard</span></a></h1>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="sidebar-menu">
                    <li class="treeview">
                        <a href="{{url('/home')}}">
                            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-laptop"></i>
                            <span>Sản phẩm</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{url('/category')}}"><i class="fa fa-angle-right"></i> Danh mục sản phẩm</a></li>
                            <li><a href="{{url('/product')}}"><i class="fa fa-angle-right"></i> Sản phẩm</a></li>
                            <li><a href="{{url('/comment')}}"><i class="fa fa-angle-right"></i> Đánh giá</a></li>
                            <li><a href="{{url('/customer')}}"><i class="fa fa-angle-right"></i> Khách hàng</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-laptop"></i>
                            <span>Oder</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{url('/oder')}}"><i class="fa fa-angle-right"></i> Đặt hàng</a></li>
                            <li><a href="{{url('/cart')}}"><i class="fa fa-angle-right"></i> Giỏ hàng</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-folder"></i> <span>Content</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{url('/')}}"><i class="fa fa-angle-right"></i> Sản phẩm</a></li>
                            <li><a href="{{url('/')}}"><i class="fa fa-angle-right"></i> Bài viết</a></li>
                            <li><a href="{{url('/')}}"><i class="fa fa-angle-right"></i> Trang</a></li>
                            <li><a href="{{url('/')}}"><i class="fa fa-angle-right"></i> tag</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-folder"></i> <span>Menu</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{url('/')}}"><i class="fa fa-angle-right"></i> Menu</a></li>
                            <li><a href="{{url('/')}}"><i class="fa fa-angle-right"></i> Menu item</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-folder"></i> <span>Thông tin người dùng</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{url('/information')}}"><i class="fa fa-angle-right"></i> Xem thông tin</a></li>
                            <li><a href="{{url('/')}}"><i class="fa fa-angle-right"></i> Cập nhật thông tin</a></li>
                        </ul>
                    </li>
                    <li class="header">Admin</li>
                    <li><a href="#"><i class="fa fa-angle-right text-red"></i> <span>Quản trị viên</span></a></li>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
    </aside>
</div>