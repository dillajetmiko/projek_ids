<!-- Sidebar -->
<div class="sidebar">
  <!-- Sidebar user (optional) -->
  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
      <img src="{{ asset('asset/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
    </div>
    <div class="info">
      <a href="#" class="d-block">Dilla Violina</a>
    </div>
  </div>

  <!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">  
      <li class="nav-item has-treeview menu-open">
        @if($menu == 'MasterTambahData')
        <a href="#" class="nav-link active">
        @else
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
      <li class="nav-item has-treeview menu-open">
        @if($menu == 'MasterBarcode')
        <a href="#" class="nav-link active">
        @else
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
            <a href="/barcode" class="nav-link active">
            @else
            <a href="/barcode" class="nav-link ">
            @endif 
              <i class="far fa-circle nav-icon"></i>
              <p>Cetak label TnJ 108</p>
            </a>
          </li>
        </ul>
      </li>
    </ul>
  </nav>
  <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->