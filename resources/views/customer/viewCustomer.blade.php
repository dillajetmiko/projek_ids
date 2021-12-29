@extends("layout.mainlayout")

@section("page_title","IDS")

@section("title","Customer")

@section("custom_css")
<!-- DataTables -->
<link rel="stylesheet" href="{{asset ('asset/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset ('asset/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endsection

@section("breadcrumb")
<li class="breadcrumb-item"><a href="/">Home</a></li>
<li class="breadcrumb-item active">Customer</li>
@endsection

@section("content")
<!-- Default box -->
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Data Customer</h3>

    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
        <i class="fas fa-minus"></i></button>
      <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
        <i class="fas fa-times"></i></button>
    </div>
  </div>
  <div class="card-body">
    @if ($errors->has('file'))
      <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('file') }}</strong>
      </span>
    @endif

    @if ($sukses = Session::get('sukses'))
      <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert"></button>
        <strong>{{ $sukses }}</strong>
      </div>
    @endif

      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#importExcel">
        Import File
      </button>
      <table id="example1" class="table table-bordered table-striped">
          <thead>
              <tr>
                  <th>ID</th>
                  <th>Nama</th>
                  <th>Alamat</th>
                  <th>Kelurahan</th>
                  <th>Foto</th>
              </tr>
          </thead>
          <tbody>
          @foreach($customer as $data)
              <tr>
                  <td>{{ $data->id }}</td>
                  <td>{{ $data->nama }}</td>
                  <td>{{ $data->alamat }}</td>
                  <td>{{ $data->subdis_id }}</td>
                  <td style="text-align:center">
                    @if ($data->file_path !== null)
                      <img src="{{url('/uploads/'.$data->file_path)}}" width="200" height="150" alt="Image"/>
                      <!-- <img src="{{asset('/storage/app/uploads/'.$data->file_path)}}" width="200" height="150" alt="Image"/> -->
                    @else
                      <img src="{{$data->foto}}" width="200" height="150" alt="Image"/>
                    @endif
                  </td>
              </tr>
          @endforeach
          </tbody>
          <tfoot>
              <tr>
                  <th>ID</th>
                  <th>Nama</th>
                  <th>Alamat</th>
                  <th>Kelurahan</th>
                  <th>Foto</th>
              </tr>
          </tfoot>
      </table>
  </div>


  <!-- Modal -->
  <div class="modal fade bd-example-modal-lg" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <form method="post" action="/importexcel" enctype="multipart/form-data">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            {{ csrf_field() }}
            <label>Pilih File Excel</label>
            <div class="form-group">
              <input type="file" name="file" required="required">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Import</button>
          </div>
        </div>
      </form>
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