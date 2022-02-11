@extends("layout.mainlayout")

@section("page_title","IDS")

@section("title","Import Excel")

@section("custom_css")

@endsection

@section("breadcrumb")
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Import Excel</li>
@endsection

@section("content")
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-lg-12">
		    @if(session()->has('success'))
			<div class="alert alert-success" role="alert">
  			    {{ session('success') }}
			</div>
		    @endif
		    @if(session()->has('failures'))
			<table class="table table-danger">
			    <tr>
				<th>Row</th>
				<th>Atrribute</th>
				<th>Errors</th>
				<th>Value</th>
			    </tr>
			    @foreach(session()->get('failures') as $validation)
				<tr>
				    <td>{{ $validation->row() }}</td>
				    <td>{{ $validation->attribute() }}</td>
				    <td>
					<ul>
					    @foreach($validation->errors() as $e)
						<li>{{ $e }}</li>
					    @endforeach
					</ul>
				    </td>
				    <td>{{ $validation->values()[$validation->attribute()] }}</td>
				</tr>
			    @endforeach
			</table>
		    @endif
			<div class="card">
				<div class="card-body">
					<div class="form-validation">
						<form class="form-valide" action="/excel-import" method="post" enctype="multipart/form-data">
							@csrf
							<div class="form-group offset-lg-1 col-lg-9">
								<input type="file" class="form-control-file @error('excel') is-invalid @enderror" name="excel">
							@error('excel')
								<div class="offset-lg-1 col-lg-9">
									<p class="text-danger">
										{{ $message }}
									</p>
								</div>
							@enderror
							</div>
							<div class="form-group row">
								<div class="col-lg-8 ml-auto">
									<button type="submit" class="btn btn-primary">Submit</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Default box -->
<div class="card">
  <div class="card-header">
    <h3 class="card-title"><strong>Customer</strong></h3>

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