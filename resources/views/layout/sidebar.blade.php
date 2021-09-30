<!-- Sidebar -->
<div class="sidebar">
  <!-- Sidebar user (optional) -->
  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
      <img src="{{ asset('asset/dist/img/kenma.jpeg') }}" class="img-circle elevation-2" alt="User Image">
    </div>
    <div class="info">
      <a href="#" class="d-block">Dilla Violina</a>
    </div>
  </div>

  <!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">  
      <li class="nav-item">
        @if($menu == 'customer')
        <a href="/customer" class="nav-link active">
        @else
        <a href="/customer" class="nav-link">
        @endif
          <i class="nav-icon fas fa-users"></i>
          <p>
            Customer
          </p>
        </a>
      </li>
      @if($menu == 'MasterTambahData')
      <li class="nav-item has-treeview menu-open">
        <a href="#" class="nav-link active">
      @else
      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
      @endif
          <i class="nav-icon far fa-plus-square"></i>
          <p>
            Tambah Data
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            @if($submenu == 'tambahdata')
            <a href="/dropdown" class="nav-link active">
            @else
            <a href="/dropdown" class="nav-link ">
            @endif 
              <i class="far fa-circle nav-icon"></i>
              <p>Tambah Customer 1</p>
            </a>
          </li>
          <li class="nav-item">
            @if($submenu == 'tambahdata2')
            <a href="/dropdown2" class="nav-link active">
            @else
            <a href="/dropdown2" class="nav-link ">
            @endif 
              <i class="far fa-circle nav-icon"></i>
              <p>Tambah Customer 2</p>
            </a>
          </li>
        </ul>
      </li>
      <!-- @if($menu == 'MasterBarcode')
      <li class="nav-item has-treeview menu-open">
        <a href="#" class="nav-link active">
      @else
      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
      @endif
          <i class="nav-icon fas fa-barcode"></i>
          <p>
            Barcode
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            @if($submenu == 'barcode')
            <a href="/barang" class="nav-link active">
            @else
            <a href="/barang" class="nav-link ">
            @endif 
              <i class="far fa-circle nav-icon"></i>
              <p>Cetak label TnJ 108</p>
            </a>
          </li>
        </ul>
      </li> -->
      <li class="nav-item">
        @if($menu == 'Barcode')
        <a href="/barang" class="nav-link active">
        @else
        <a href="/barang" class="nav-link">
        @endif
          <i class="nav-icon fas fa-barcode"></i>
          <p>
            Cetak label TnJ 108
          </p>
        </a>
      </li>
      <li class="nav-item">
        @if($menu == 'scanner')
        <a href="/scanner" class="nav-link active">
        @else
        <a href="/scanner" class="nav-link">
        @endif
          <i class="nav-icon fas fa-th"></i>
          <p>
            Barcode Scanner
          </p>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->