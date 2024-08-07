<aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
        <img src="{{ asset('adminlte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">MTKSR PAM</span>
      </a>
 
     <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="{{ asset('adminlte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">Fakhruddin Fu'ad</a>
          </div>
        </div>
  
        <!-- SidebarSearch Form -->
        <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>
  
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                  with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="{{ url('/dashboard') }}" class="nav-link">
                <i class="nav-icon bi bi-speedometer2"></i>
                <p>
                  Dashboard
                  {{-- <i class="right fas fa-angle-left"></i> --}}
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('riwayat-tagihan') }}" class="nav-link">
                <i class="bi bi-receipt nav-icon"></i>
                <p>Riwayat Tagihan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('tagihan') }}" class="nav-link">
                <i class="bi bi-receipt-cutoff nav-icon"></i>
                <p>Tagihan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('pemakaian') }}" class="nav-link">
                <i class="bi bi-droplet-half nav-icon"></i>
                <p>Pemakaian</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('pelanggan') }}" class="nav-link">
                <i class="bi bi-people nav-icon"></i>
                <p>Data Pelanggan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('abonemen') }}" class="nav-link">
                <i class="bi bi-tags nav-icon"></i>
                <p>Abonemen</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('asset') }}" class="nav-link">
                <i class="bi bi-database nav-icon"></i>
                <p>Asset</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('wallet') }}" class="nav-link">
                <i class="bi bi-wallet2 nav-icon"></i>
                <p>Wallets</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('kas') }}" class="nav-link">
                <i class="bi bi-journals nav-icon"></i>
                <p>Buku Kas</p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
     <!-- /.sidebar -->
</aside>