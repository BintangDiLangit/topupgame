<div class="deznav">
    <div class="deznav-scroll">
        <div class="main-profile">
            <div class="image-bx">
                <img src="{{ asset('public/images/Untitled-1.jpg') }}" alt="">
                <a href="javascript:void(0);"><i class="fa fa-cog" aria-hidden="true"></i></a>
            </div>
            <h5 class="name"><span class="font-w400">Hello,</span> {{ Auth::user()->name }}</h5>
            <p class="email">{{ Auth::user()->email }}</p>
        </div>
        <ul class="metismenu" id="menu">
            <li class="nav-label first">Main Menu</li>
            <li>
                <a class="" href="/admin/dashboard" aria-expanded="false">
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>
            <li class="nav-label">Master Data</li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-077-menu-1"></i>
                    <span class="nav-text">Master Kategori</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('admin.master.kategori.index') }}">Master Kategori</a></li>
                </ul>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-077-menu-1"></i>
                    <span class="nav-text">Kategori</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('admin.kategori.index') }}">Kategori</a></li>
                </ul>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-077-menu-1"></i>
                    <span class="nav-text">Vendor</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('admin.vendor.index') }}">Vendor</a></li>
                </ul>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-077-menu-1"></i>
                    <span class="nav-text">Produk</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('admin.produk.index') }}">Produk</a></li>
                </ul>
            </li>
            <li class="nav-label">Transaksi</li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-network"></i>
                    <span class="nav-text">Transaksi</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('admin.transaksi.index') }}">Transaksi</a></li>
                    <li><a href="{{ route('admin.riwayat.transaksi.index') }}">Riwayat</a></li>
                    <li><a href="/admin/deposit">Deposit</a></li>
                </ul>
            </li>
            <li class="nav-label">Blog</li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-049-copy"></i>
                    <span class="nav-text">Blog</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('admin.kategori-blog.index') }}">Kategori Blog</a></li>
                    <li><a href="{{ route('admin.blog.index') }}">Blog</a></li>
                    <li><a href="{{ route('admin.komentar.index') }}">Komentar</a></li>
                </ul>
            </li>
            <li class="nav-label">Account</li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-049-copy"></i>
                    <span class="nav-text">Account</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('admin.roles.index') }}">Roles</a></li>
                </ul>
                <ul aria-expanded="false">
                    <li><a href="{{ route('admin.users.index') }}">Users</a></li>
                </ul>
            </li>
        </ul>
        <div class="copyright">
            <p><strong>Admin Dashboard</strong> © 2023 All Rights Reserved</p>
            <p class="fs-12">Made with <span class="heart"></span> by KonsulinAja</p>
        </div>
    </div>
</div>
