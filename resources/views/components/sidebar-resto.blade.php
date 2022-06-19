<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo d-flex">
                    <h1 class="mr-3">{{config('app.name')}}</h1>
                    <a href="{{url('/')}}"><img src="{{asset('frontend/assets/images/logo/logo.png')}}" alt="Logo"
                                                srcset="" style="height: 70px !important;"></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>

                <li class="sidebar-item
                {{(Request::is('admin')) ? 'active' : ''}}
                {{(Request::is('admin-resto')) ? 'active' : ''}}
                {{(Request::is('user')) ? 'active' : ''}}
                    ">
                    <a href="{{url('/home')}}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>


                <li class="sidebar-item  has-sub {{ (Request::is('resto-admin/cuisine/*')) ? 'active' : ''}}">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-stack"></i>
                        <span>Kategori Menu</span>
                    </a>
                    <ul class="submenu  {{ (Request::is('resto-admin/cuisine/*')) ? 'active' : ''}} ">
                        <li class="submenu-item  {{ (Request::is('/resto-admin/cuisine/create')) ? 'active' : ''}}">
                            <a href="{{url('/resto-admin/cuisine/create')}}">Tambah Cuisine Category</a>
                        </li>
                        <li class="submenu-item  {{ (Request::is('/admin/user/manage')) ? 'active' : ''}}">
                            <a href="{{url('/admin/user/manage')}}">Manage</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item  has-sub {{ (Request::is('resto-admin/food-menu/*')) ? 'active' : ''}}">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-stack"></i>
                        <span>Menu Masakan</span>
                    </a>
                    <ul class="submenu  {{ (Request::is('resto-admin/food-menu/*')) ? 'active' : ''}} ">
                        <li class="submenu-item  {{ (Request::is('/resto-admin/food-menu/create')) ? 'active' : ''}}">
                            <a href="{{url('/resto-admin/food-menu/create')}}">Tambah Menu</a>
                        </li>
                        <li class="submenu-item  {{ (Request::is('/resto-admin/food-menu/manage')) ? 'active' : ''}}">
                            <a href="{{url('/resto-admin/food-menu/manage')}}">Manage</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item  has-sub {{ (Request::is('resto-admin/food-order/*')) ? 'active' : ''}}">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-stack"></i>
                        <span>Pesanan Masuk</span>
                    </a>
                    <ul class="submenu  {{ (Request::is('resto-admin/food-order/*')) ? 'active' : ''}} ">
                        <li class="submenu-item  {{ (Request::is('/resto-admin/food-order/all')) ? 'active' : ''}}">
                            <a href="{{url('/resto-admin/food-order/all')}}">Semua Pesanan</a>
                        </li>
                        <li class="submenu-item  {{ (Request::is('/resto-admin/food-order/unprocessed')) ? 'active' : ''}}">
                            <a href="{{url('/resto-admin/food-order/unprocessed')}}">Belum Diproses</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-title">Logout</li>
                <li class="sidebar-item  ">

                    <a href="{{url('/logout')}}" class="sidebar-link">
                        <i class="bi bi-life-preserver"></i>
                        <span>Logout</span>
                    </a>
                </li>


            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
