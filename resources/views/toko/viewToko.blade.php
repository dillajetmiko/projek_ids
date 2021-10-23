@extends("layout.mainlayout")

@section("page_title","IDS")

@section("title","Toko")

@section("custom_css")
<!-- DataTables -->
<link rel="stylesheet" href="{{asset ('asset/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset ('asset/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endsection

@section("breadcrumb")
<li class="breadcrumb-item"><a href="/">Home</a></li>
<li class="breadcrumb-item active">Toko</li>
@endsection

@section("content")
<!-- Default box -->
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Data Toko</h3>

    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
        <i class="fas fa-minus"></i></button>
      <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
        <i class="fas fa-times"></i></button>
    </div>
  </div>
  <div class="card-body">
    <div style="height: 70px;">
      <a href="/toko/formToko">
        <button type="button" class="btn btn-info float-right" style="float: right; margin: 5px"><i class="fas fa-plus"></i>  Tambah Data Lokasi Toko</button>
      </a><br>
    </div>
    <div>
      <table id="example1" class="table table-bordered table-striped">
          <thead>
              <tr>
                  <th>Barcode</th>
                  <th>Nama Toko</th>
                  <th>Latitude</th>
                  <th>Longitude</th>
                  <th>Accuracy</th>
              </tr>
          </thead>
          <tbody>
          @php
              $generatorPNG = new Picqer\Barcode\BarcodeGeneratorPNG();
          @endphp
          @foreach($lokasi_toko as $data)
              <tr>
                  <td style="text-align:center">
                    <img src="data:image/png;base64,{{ base64_encode($generatorPNG->getBarcode($data->barcode, $generatorPNG::TYPE_CODE_128)) }}"><br>
                    {{ $data->barcode }}<br>
                  </td>
                  <td>{{ $data->nama_toko }}</td>
                  <td>{{ $data->latitude }}</td>
                  <td>{{ $data->longitude }}</td>
                  <td>{{ $data->accuracy }}</td>
              </tr>
          @endforeach
          </tbody>
          <tfoot>
              <tr>
                  <th>Barcode</th>
                  <th>Nama Toko</th>
                  <th>Latitude</th>
                  <th>Longitude</th>
                  <th>Accuracy</th>
              </tr>
          </tfoot>
      </table>
    </div>
  </div>
  <!-- /.card-body -->
  <div class="card-footer">
    
  </div>
  <!-- /.card-footer-->
</div>
<!-- /.card -->
@endsection

@section("scripts")
<script src="{{asset ('asset/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset ('asset/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset ('asset/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset ('asset/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>

<script>
  $(function () {
	$("#example1").DataTable({
	  "responsive": true,
	  "autoWidth": false,
	});
  });
</script>
@endsection