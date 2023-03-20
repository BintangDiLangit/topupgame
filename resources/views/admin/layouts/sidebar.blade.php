<div class="deznav">
    <div class="deznav-scroll">
        <div class="main-profile">
            <div class="image-bx">
                <img src="public/images/Untitled-1.jpg" alt="">
                <a href="javascript:void(0);"><i class="fa fa-cog" aria-hidden="true"></i></a>
            </div>
            <h5 class="name"><span class="font-w400">Hello,</span> Marquez</h5>
            <p class="email">marquezzzz@mail.com</p>
        </div>
        <ul class="metismenu" id="menu">
            <li class="nav-label first">Main Menu</li>
            <li>
                <a class="has-arrow ai-icon" href="/admin/dashboard" aria-expanded="false">
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>
            <li class="nav-label">Products</li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-077-menu-1"></i>
                    <span class="nav-text">Products</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('admin.produk.index') }}">Products</a></li>
                </ul>
            </li>
            <li class="nav-label">Transactions</li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-network"></i>
                    <span class="nav-text">Transaksi</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="table-bootstrap-basic.html">Transaksi</a></li>
                    <li><a href="table-datatable-basic.html">Riwayat</a></li>
                    <li><a href="/admin/deposit">Deposit</a></li>
                </ul>
            </li>
        </ul>
        <div class="copyright">
            <p><strong>Admin Dashboard</strong> © 2023 All Rights Reserved</p>
            <p class="fs-12">Made with <span class="heart"></span> by KonsulinAja</p>
        </div>
    </div>
</div>
