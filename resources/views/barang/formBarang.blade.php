@extends("layout.mainlayout")

@section("page_title","IDS")

@section("title","Tambah Barang")

@section("custom_css")

@endsection

@section("breadcrumb")
<li class="breadcrumb-item"><a href="/">Home</a></li>
<li class="breadcrumb-item"><a href="/barang">Barang</a></li>
<li class="breadcrumb-item active">Tambah Barang</li>
@endsection

@section("content")
<!-- Default box -->
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Tambah Data Barang</h3>

    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
        <i class="fas fa-minus"></i></button>
      <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
        <i class="fas fa-times"></i></button>
    </div>
  </div>
  <div class="card-body">
    <form method="post" action="/barang/tambahBarang" enctype="multipart/form-data">
      <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
      <div class="container">
        <div class="form-group">
          <label for="id">ID</label>
          <input type="text" name="id" class="form-control">
        </div>
        <div class="form-group">
          <label for="nama">Nama Barang</label>
          <input type="text" name="nama" class="form-control">
        </div>
        <div class="col-md-12 text-center">
            <br/>
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
      </div>
    </form>
  </div>
  <!-- /.card-body -->
  <div class="card-footer">
    
  </div>
  <!-- /.card-footer-->
</div>
<!-- /.card -->
@endsection

@section("scripts")

@endsection