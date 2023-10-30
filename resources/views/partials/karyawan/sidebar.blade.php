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
                            <span class="user-level">
                                {{ (Auth::guard('user')->user()->role == 1) ? 'Administrator' : 'Karyawan' }}
                            </span>
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
                    <h4 class="text-section">Quotation</h4>
                </li>
                <li class="nav-item {{ request()->is('karyawan/menu/confirmed-quotation') ? 'active' : '' }}">
                    <a href="/karyawan/menu/confirmed-quotation">
                        <p>Confirmed Quotation</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Project</h4>
                </li>
                <li class="nav-item {{ request()->is('karyawan/master-data/produk','karyawan/master-data/produk/tambah-data','karyawan/master-data/produk/edit/'.$slug) ? 'active' : '' }}">
                    <a href="/karyawan/master-data/produk">
                        <p>On Going Project</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->is('karyawan/master-data/perusahaan','karyawan/master-data/perusahaan/tambah-data','karyawan/master-data/perusahaan/edit/'.$slug) ? 'active' : '' }}">
                    <a href="/karyawan/master-data/perusahaan">
                        <p>Done Project</p>
                    </a>
                </li>
            </ul>
            {{-- <ul class="nav nav-primary">
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Master Data</h4>
                </li>
                <li class="nav-item {{ request()->is('karyawan/master-data/produk','karyawan/master-data/produk/tambah-data','karyawan/master-data/produk/edit/'.$slug) ? 'active' : '' }}">
                    <a href="/karyawan/master-data/produk">
                        <p>Produk</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->is('karyawan/master-data/perusahaan','karyawan/master-data/perusahaan/tambah-data','karyawan/master-data/perusahaan/edit/'.$slug) ? 'active' : '' }}">
                    <a href="/karyawan/master-data/perusahaan">
                        <p>Perusahaan</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Quotation</h4>
                </li>
                <li class="nav-item {{ request()->is('karyawan/menu/draft-quotation','karyawan/menu/draft-quotation/tambah-data','karyawan/menu/draft-quotation/view-quotation/'.$slug) ? 'active' : '' }}">
                    <a href="/karyawan/menu/draft-quotation">
                        <p>Draft Quotation</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->is('karyawan/menu/confirmed-quotation','karyawan/menu/confirmed-quotation/view-quotation/'.$slug) ? 'active' : '' }}">
                    <a href="/karyawan/menu/confirmed-quotation">
                        <p>Confirmed Quotation</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Invoice</h4>
                </li>
                <li class="nav-item {{ request()->is('karyawan/menu/draft-invoice','karyawan/menu/draft-invoice/tambah-data','karyawan/menu/draft-invoice/view-invoice/'.$slug) ? 'active' : '' }}">
                    <a href="/karyawan/menu/draft-invoice">
                        <p>Draft Invoice</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->is('karyawan/menu/confirmed-invoice','karyawan/menu/confirmed-invoice/view-invoice/'.$slug) ? 'active' : '' }}">
                    <a href="/karyawan/menu/confirmed-invoice">
                        <p>Confirmed Invoice</p>
                    </a>
                </li>
            </ul> --}}
        </div>
    </div>
</div>
