<nav id="mainnav-container">
    <div id="mainnav">
        <!--Menu-->
        <!--================================-->
        <div id="mainnav-menu-wrap">
            <div class="nano">
                <div class="nano-content">

                    <!--Profile Widget-->
                    <!--================================-->
                    <div id="mainnav-profile" class="mainnav-profile">
                    </div>
                    <ul id="mainnav-menu" class="list-group">
                        <!--Category name-->
                        <!-- Sidebar Navigation -->
                        <li class="list-header">Navigation</li>

                        <li class="{{ request()->is('home') ? 'active-link' : '' }}">
                            <a href="{{ route('home') }}">
                                <i class="demo-pli-home"></i>
                                <span class="menu-title">Home</span>
                            </a>
                        </li>

                        <li class="{{ request()->is('admin/paket_wisata') ? 'active-link' : '' }}">
                            <a href="{{ route('paket_wisata.index') }}">
                                <i class="fas fa-map"></i>
                                <span class="menu-title">Paket Wisata</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('admin/pesanan') ? 'active-link' : '' }}">
                            <a href="{{ route('adminpesanan.index') }}">
                                <i class="fas fa-shopping-cart"></i>
                                <span class="menu-title">Daftar Pesanan</span>
                            </a>
                        </li>
                    </ul>


                </div>
            </div>
        </div>
        <!--================================-->
        <!--End menu-->

    </div>
</nav>
