@extends("layout.mainlayout")

@section("page_title","IDS")

@section("title","Home")

@section("custom_css")

@endsection

@section("breadcrumb")
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Home</li>
@endsection

@section("content")
<!-- Default box -->
<div class="card">
  <div class="card-header">
    <h3 class="card-title"><strong>My Google Info</strong></h3>

    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
        <i class="fas fa-minus"></i></button>
      <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
        <i class="fas fa-times"></i></button>
    </div>
  </div>
  <div class="card-body">
  <table id="example2" class="table table-bordered table-hover">
			<thead>
				<tr>
                    
                    <th class="text-center">ID Customer</th>
                    <th class="text-center">Nama Customer</th>
                    <th class="text-center">Alamat</th>
                    <th class="text-center">kodepos</th>
                    <!-- <th class="text-center">File Path</th> -->
                    
                </tr>
            </thead>
            <tbody>
            	@foreach($cust as $data)
            	<tr>
            		
                <td>{{ $data->id_customer }}</td>
                    <td>{{ $data->nama}}
                    </td>
                    <td>{{ $data->alamat}}</td>
                    <td>{{ $data->kodepos}}</td>
                </tr>
                @endforeach
            </tbody>
		</table>
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