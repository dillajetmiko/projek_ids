@extends("layout.mainlayout")

@section("page_title","IDS")

@section("title","Blank Page")

@section("custom_css")
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
<style type="text/css">
    #results { padding:10px; border:1px solid; background:#ccc; }
</style>
@endsection

@section("breadcrumb")
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Blank Page</li>
@endsection

@section("content")
<!-- Default box -->
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Title</h3>

    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
        <i class="fas fa-minus"></i></button>
      <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
        <i class="fas fa-times"></i></button>
    </div>
  </div>
  <div class="card-body">
      <form action="/simpan" method="post" enctype="multipart/form-data">
        <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
        nama: <input type="text" class="form-control" name="nama"><br>
        alamat : <input type="text" class="form-control" name="alamat"><br>
        alamat : <input type="text" class="form-control" name="subdistrict"><br>
        
        <button type="submit" class="btn btn-primary">Simpan</button>

      </form>
  </div>
  <!-- /.card-body -->
  <div class="card-footer">
    Footer
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
        width: 470,
        height: 370,
        image_format: 'jpeg',
        jpeg_quality: 90
    });
  
    Webcam.attach( '#my_camera' );
  
    function take_snapshot() {
        Webcam.snap( function(data_uri) {
            $(".image-tag").val(data_uri);
            document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
        } );
    }
</script>
@endsection