@extends("layout.mainlayout")

@section("page_title","IDS")

@section("title","Tambah Data")

@section("custom_css")
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
<style type="text/css">
    #results { width: 370px; padding:5px; border:1px solid; background:#ccc; }
</style>
@endsection

@section("breadcrumb")
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Tambah Data</li>
@endsection

@section("content")
<!-- Default box -->
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Tambah Data Customer 1</h3>

    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
        <i class="fas fa-minus"></i></button>
      <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
        <i class="fas fa-times"></i></button>
    </div>
  </div>
  <div class="card-body">
    <form method="post" action="/simpan" enctype="multipart/form-data">
    <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
      <div class="container">
        <div class="form-group">
          <label for="nama">Nama:</label>
          <input type="text" name="nama" class="form-control" placeholder="Nama">
        </div>
        <div class="form-group">
          <label for="alamat">Alamat:</label>
          <input type="text" name="alamat" class="form-control" placeholder="Alamat">
        </div>
        <div class="form-group">
          <label for="province">Provisi:</label>
          <select id="province" name="category_id" class="form-control select2">
            <option value="" selected disabled>Select Province</option>
            @foreach($provinces as $key => $province)
            <option value="{{$key}}"> {{$province}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="city">Kota/Kabupaten:</label>
          <select name="city" id="city" class="form-control"></select>
        </div>
        <div class="form-group">
          <label for="district">Kecamatan:</label>
          <select name="district" id="district" class="form-control"></select>
        </div>
        <div class="form-group">
          <label for="subdistrict">Kelurahan:</label>
          <select name="subdistrict" id="subdistrict" class="form-control"></select>
        </div>

        <div class="form-group">
          <label for="foto">Foto:</label>

          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Ambil Foto
          </button>
        </div>

        <!-- Modal -->
        <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ambil Foto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-6">
                      <div id="my_camera"></div>
                      <br/>
                      <input type=button class="btn btn-sm btn-primary" value="Take Snapshot" onClick="take_snapshot()">
                      <input type="hidden" name="image" class="image-tag">
                  </div>
                  <div class="col-md-6">
                      <div id="results">Your captured image will appear here...</div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Simpan</button>
                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                <!-- <a id="simpanfoto">
                  <button type="button" class="btn btn-primary">Simpan</button>
                </a> -->
              </div>
            </div>
          </div>
        </div>


        <div class="row">
          <!-- <div class="col-md-6">
              <div id="my_camera"></div>
              <br/>
              <input type=button class="btn btn-sm btn-primary" value="Take Snapshot" onClick="take_snapshot()">
              <input type="hidden" name="image" class="image-tag">
          </div> -->
          <div class="col-md-6">
              <div id="results2">Your captured image will appear here...</div>
          </div>
          <div class="col-md-12 text-center">
              <br/>
              <button type="submit" class="btn btn-success">Submit</button>
          </div>
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
<script type=text/javascript>
  $('#province').change(function(){
  var provinceID = $(this).val();  
  if(provinceID){
    $.ajax({
      type:"GET",
      url:"{{url('getCity')}}?prov_id="+provinceID,
      success:function(res){        
      if(res){
        $("#city").empty();
        $("#district").empty();
        $("#subdistrict").empty();
        $("#city").append('<option>Select City</option>');
        $.each(res,function(key,value){
          $("#city").append('<option value="'+key+'">'+value+'</option>');
        });
      
      }else{
        $("#city").empty();
      }
      }
    });
  }else{
    $("#city").empty();
    $("#district").empty();
    $("#subdistrict").empty();
  }   
  });
  $('#city').on('change',function(){
  var cityID = $(this).val();  
  if(cityID){
    $.ajax({
      type:"GET",
      url:"{{url('getDistrict')}}?city_id="+cityID,
      success:function(res){        
      if(res){
        $("#district").empty();
        $("#subdistrict").empty();
        $("#district").append('<option>Select District</option>');
        $.each(res,function(key,value){
          $("#district").append('<option value="'+key+'">'+value+'</option>');
        });
      
      }else{
        $("#district").empty();
      }
      }
    });
  }else{
    $("#district").empty();
    $("#subdistrict").empty();
  }
    
  });
  $('#district').on('change',function(){
  var districtID = $(this).val();  
  if(districtID){
    $.ajax({
      type:"GET",
      url:"{{url('getSubdistrict')}}?dis_id="+districtID,
      success:function(res){        
      if(res){
        $("#subdistrict").empty();
        $("#subdistrict").append('<option>Select SubDistrict</option>');
        $.each(res,function(key,value){
          $("#subdistrict").append('<option value="'+key+'">'+value+'</option>');
        });
      
      }else{
        $("#subdistrict").empty();
      }
      }
    });
  }else{
    $("#subdistrict").empty();
  }
    
  });
</script>

<script language="JavaScript">
    Webcam.set({
        width: 360,
        height: 260,
        image_format: 'jpeg',
        jpeg_quality: 90
    });
  
    Webcam.attach( '#my_camera' );
  
    function take_snapshot() {
        Webcam.snap( function(data_uri) {
            $(".image-tag").val(data_uri);
            document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
            document.getElementById('results2').innerHTML = '<img src="'+data_uri+'"/>';
        } );
    }
    // document.getElementById('btn').addEventListener('click', take_snapshot);

    // function ambilFoto()
    // {
    //   var link = document.getElementById('simpanfoto')
    //   link.href="/pegawai/hapus/"
    //   $('#deletePegawai').modal('show')
    // }
</script>

@endsection