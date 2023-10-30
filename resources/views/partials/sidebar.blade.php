<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="{{ asset('atlantis') }}/assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a href="#collapseExample" aria-expanded="true">
                        <span>
                            {{ Auth::guard('user')->user()->name }}
                            @if ( Auth::guard('user')->user()->role == 1)
                            <span class="user-level">Administrator</span>
                            @else
                            <span class="user-level">Karyawan</span>
                            @endif
                            <span class="caret"></span>
                        </span>
                    </a>
                    <div class="clearfix"></div>

                    <div class="collapse in" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="#profile">
                                    <span class="link-collapse">My Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="#edit">
                                    <span class="link-collapse">Edit Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="#settings">
                                    <span class="link-collapse">Settings</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="nav nav-primary">
                <li class="nav-section ">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <li class="nav-item {{ request()->is('home') ? 'active' : '' }}">
                        <a href="#base">
                            <p>Dashboard</p>
                        </a>
                    </li>
                </li>
            </ul>
            <ul class="nav nav-primary">
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Master Data</h4>
                </li>
                <li class="nav-item {{ request()->is('master-data/produk','master-data/produk/tambah-data','master-data/produk/edit/'.$slug) ? 'active' : '' }}">
                    <a href="/master-data/produk">
                        <p>Produk</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->is('master-data/perusahaan','master-data/perusahaan/tambah-data','master-data/perusahaan/edit/'.$slug) ? 'active' : '' }}">
                    <a href="/master-data/perusahaan">
                        <p>Perusahaan</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->is('master-data/karyawan','master-data/karyawan/edit/'.$slug) ? 'active' : '' }}">
                    <a href="/master-data/karyawan">
                        <p>Karyawan</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Quotation</h4>
                </li>
                <li class="nav-item {{ request()->is('menu/draft-quotation','menu/draft-quotation/tambah-data','menu/draft-quotation/view-quotation/'.$slug) ? 'active' : '' }}">
                    <a href="/menu/draft-quotation">
                        <p>Draft Quotation</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->is('menu/confirmed-quotation','menu/confirmed-quotation/view-quotation/'.$slug) ? 'active' : '' }}">
                    <a href="/menu/confirmed-quotation">
                        <p>Confirmed Quotation</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Project</h4>
                </li>
                <li class="nav-item {{ request()->is('menu/project/ongoing*') ? 'active':'' }}">
                    <a href="/menu/project/ongoing">
                        <p>Project Ongoing</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->is('menu/project/done') ? 'active':'' }}">
                    <a href="/menu/project/done">
                        <p>Project Done</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Invoice</h4>
                </li>
                <li class="nav-item {{ request()->is('menu/draft-invoice','menu/draft-invoice/tambah-data','menu/draft-invoice/view-invoice/'.$slug) ? 'active' : '' }}">
                    <a href="/menu/draft-invoice">
                        <p>Draft Invoice</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->is('menu/confirmed-invoice','menu/confirmed-invoice/view-invoice/'.$slug) ? 'active' : '' }}">
                    <a href="/menu/confirmed-invoice">
                        <p>Confirmed Invoice</p>
                    </a>
                </li>
                {{-- <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Delivery Orded</h4>
                </li>
                <li class="nav-item {{ request()->is('menu/draft-invoice','menu/draft-invoice/tambah-data','menu/draft-invoice/view-invoice/'.$slug) ? 'active' : '' }}">
                    <a href="/menu/draft-invoice">
                        <p>Draft DO</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->is('menu/confirmed-invoice','menu/confirmed-invoice/view-invoice/'.$slug) ? 'active' : '' }}">
                    <a href="/menu/confirmed-invoice">
                        <p>Confirmed DO</p>
                    </a>
                </li> --}}
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">CV Mitra Gabril Perkasa</h4>
                </li>
                <li class="nav-item {{ request()->is('profile') ? 'active' : '' }}">
                    <a href="/profile">
                        <p>Profile</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
