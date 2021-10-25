@extends("layout.mainlayout")

@section("page_title","IDS")

@section("title","Barang")

@section("custom_css")
<!-- DataTables -->
<link rel="stylesheet" href="{{asset ('asset/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset ('asset/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<!-- Checkbox -->
<link type="text/css" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css" rel="stylesheet" />

@endsection

@section("breadcrumb")
<li class="breadcrumb-item"><a href="/">Home</a></li>
<li class="breadcrumb-item active">Barang</li>
@endsection

@section("content")
<!-- Default box -->
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Data Barang</h3>

    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
        <i class="fas fa-minus"></i></button>
      <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
        <i class="fas fa-times"></i></button>
    </div>
  </div>
  <div class="card-body">
    <div style="height: 70px;">
      <!-- <a href="/generate-pdf">
				<button type="button" class="btn btn-secondary float-left" style="float: left;  margin: 5px"><i class="fas fa-file-download">  </i>  Cetak Barcode</button>
      </a><br> -->
      <a href="/barang/formBarang">
        <button type="button" class="btn btn-info float-right" style="float: right; margin: 5px"><i class="fas fa-plus"></i>  Tambah Data Barang</button>
      </a>

      <form action="" method="">
        <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
        <label for="">kolom</label>
        <input type="number" id="col" name="col" min="1" max="5" value="1">
        <label for="">baris</label>
        <input type="number" id="row" name="row" min="1" max="8" value="1">
      </form>
      <button id="generate" type="button" class="btn btn-secondary float-left" style="float: left;  margin: 5px"><i class="fas fa-file-download">  </i>  Cetak Barcode</button>
      <!-- <b>Data submitted to the server:</b>
      <p id="example-console"></p> -->
    </div>
    <div>
      <form id="frm-example" action="/generate-pdf" method="POST">
        <table id="example" class="display" cellspacing="0" width="100%">
          <thead>
              <tr>
                  <th><input name="select_all" value="" id="example-select-all" type="checkbox" /></th>
                  <th>ID</th>
                  <th>Nama</th>
                  <th>TimeStamp</th>
                  <th>Barcode</th>
              </tr>
          </thead>
          <tbody>
          @php
              $generatorPNG = new Picqer\Barcode\BarcodeGeneratorPNG();
          @endphp
          @foreach($barang as $data)
              <tr>
                  <td>{{ $data->id_barang }}</td>
                  <td>{{ $data->id_barang }}</td>
                  <td>{{ $data->nama }}</td>
                  <td>{{ $data->timestamp }}</td>
                  <td style="text-align:center">
                    <img src="data:image/png;base64,{{ base64_encode($generatorPNG->getBarcode($data->id_barang, $generatorPNG::TYPE_CODE_128)) }}"><br>
                    {{ $data->id_barang }}<br>
                    {{ $data->nama }}
                  </td>
              </tr>
          @endforeach
          </tbody>
          <tfoot>
              <tr>
                  <th></th>
                  <th>ID</th>
                  <th>Nama</th>
                  <th>TimeStamp</th>
                  <th>Barcode</th>
              </tr>
          </tfoot>
      
        </table>
        <!-- <hr>
        <p><button>Submit</button></p> -->
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

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>



<script>
$(document).ready(function (){   
   var table = $('#example').DataTable({
    "responsive": true,
	  "autoWidth": false,  
    'columnDefs': [{
         'targets': 0,
         'searchable':false,
         'orderable':false,
         'className': 'dt-body-center',
         'render': function (data, type, full, meta){
             return '<input type="checkbox" name="check" value="' 
                + $('<div/>').text(data).html() + '">';
         }
      }],
      'order': [1, 'asc']
   });

   // Handle click on "Select all" control
   $('#example-select-all').on('click', function(){
      // Check/uncheck all checkboxes in the table
      var rows = table.rows({ 'search': 'applied' }).nodes();
      $('input[type="checkbox"]', rows).prop('checked', this.checked);
   });

   // Handle click on checkbox to set state of "Select all" control
   $('#example tbody').on('change', 'input[type="checkbox"]', function(){
      // If checkbox is not checked
      if(!this.checked){
         var el = $('#example-select-all').get(0);
         // If "Select all" control is checked and has 'indeterminate' property
         if(el && el.checked && ('indeterminate' in el)){
            // Set visual state of "Select all" control 
            // as 'indeterminate'
            el.indeterminate = true;
         }
      }
   });

       //1-----------------------
    // $("#generate").click(function(e){
    //   var favorite = [];
    //   $.ajax({
    //       type:"GET",
    //       url:"{{url('getCity')}}?prov_id="+provinceID,
    //       success:function(res){        
    //       if(res){
    //         $("#city").empty();
    //         $("#district").empty();
    //         $("#subdistrict").empty();
    //         $("#city").append('<option>Select City</option>');
    //         $.each(res,function(key,value){
    //           $("#city").append('<option value="'+key+'">'+value+'</option>');
    //         });
          
    //       }else{
    //         $("#city").empty();
    //       }
    //       }
    //     });
    // });
        //asli-----------------------
  //  $('#generate').on('click', function(e){
  //     var favorite = [];
  //     $.each($("input[name='check']:checked"), function(){
  //         favorite.push($(this).val());
  //     });
  //     // alert("My favourite sports are: " + favorite.join(", "));
  //     $('#example-console').text(favorite.join(","));
  
  //     e.preventDefault(); 
  //  });

       //3bisa---------------------------------
   $('#generate').on('click', function(e){
      var favorite = [];
      var row =  Number(document.getElementById("row").value);
      var col =  Number(document.getElementById("col").value);
      $.each($("input[name='check']:checked"), function(){
          favorite.push($(this).val());
      });
      parameter= "/"+ favorite.join()+"/"+col+"/"+row;
      url= "{{url('cetakpdf')}}";
      document.location.href=url+parameter;
      // $.ajax({
      //     type: "GET",
      //     url: "{{route('generate')}}",
      //     data: {id_barang : favorite}, 
      //     // dataType: 'json',
      //     success: function(data){
      //         // alert("OK");
      //         // alert(data);
      //         console.log(data);
      //         // alert("My favourite sports are: " +data);
      //     }
      // });
      // alert("My favourite sports are: " + favorite.join(", "));
      // $('#example-console').text(favorite.join(","));
  
      e.preventDefault(); 
   });

   //3------------------------------
  //  $('#frm-example').on('submit', function(e){
  //     var favorite = [];
  //     $.each($("input[type='checkbox']:checked"), function(){
  //         favorite.push($(this).val());
  //     });
  //     // alert("My favourite sports are: " + favorite.join(", "));
  //     $('#generate').text(favorite.join(","));

  //     $('#generate').click(function(){ 
  //       var favorit = $(this).val();
  //       if(favorit){
  //         $.ajax({
  //           type:"GET",
  //           url:"{{url('generate-pdf')}}?id_barang="+favorit,
  //           success:function(res){        
  //           if(res){
  //             $('#example-console').text(favorite.join(","));
            
  //           }
  //           }
  //         });
  //       }  
  //       });
  
  //     e.preventDefault(); 
  //  });

        //2-------------------------------------------
  //  $('#frm-example').on('submit', function(e){
  //     var form = this;

  //     // Iterate over all checkboxes in the table
  //     table.$('input[type="checkbox"]').each(function(){
  //        // If checkbox doesn't exist in DOM
  //        if(!$.contains(document, this)){
  //           // If checkbox is checked
  //           if(this.checked){
  //              // Create a hidden element 
  //              $(form).append(
  //                 $('<input>')
  //                    .attr('type', 'hidden')
  //                    .attr('name', this.name)
  //                    .val(this.value)
  //              );
  //           }
  //        } 
  //     });

  //     // FOR TESTING ONLY
      
  //     // Output form data to a console
  //     $('#example-console').text($(form).serialize()); 
  //     console.log("Form submission", $(form).serialize()); 

       
  //     // Prevent actual form submission
  //     e.preventDefault();
  //  });



});
</script>


@endsection