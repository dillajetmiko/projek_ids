@extends("layout.mainlayout")

@section("page_title","IDS")

@section("title","Tambah Toko")

@section("custom_css")

@endsection

@section("breadcrumb")
<li class="breadcrumb-item"><a href="/">Home</a></li>
<li class="breadcrumb-item"><a href="/toko">Toko</a></li>
<li class="breadcrumb-item active">Tambah Toko</li>
@endsection

@section("content")
<!-- Default box -->
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Tambah Data Toko</h3>

    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
        <i class="fas fa-minus"></i></button>
      <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
        <i class="fas fa-times"></i></button>
    </div>
  </div>
  <div class="card-body">
    <form method="post" action="/toko/tambahToko" enctype="multipart/form-data">
      <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
      <div class="container">
        <div class="form-group">
          <label for="barcode">Barcode</label>
          <input type="text" name="barcode" class="form-control">
        </div>
        <div class="form-group">
          <label for="nama">Nama Toko</label>
          <input type="text" name="nama" class="form-control">
        </div>
        <div class="form-group">
          <label for="latitude">Latitude</label>
          <input type="text" name="latitude" class="form-control">
        </div>
        <div class="form-group">
          <label for="longitude">Longitude</label>
          <input type="text" name="longitude" class="form-control">
        </div>
        <div class="form-group">
          <label for="accuracy">Accuracy</label>
          <input type="text" name="accuracy" class="form-control">
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