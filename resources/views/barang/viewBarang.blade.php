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
      <a href="/generate-pdf">
				<button type="button" class="btn btn-secondary float-left" style="float: left;  margin: 5px"><i class="fas fa-file-download">  </i>  Cetak Barcode</button>
      </a>
      <a href="/barang/formBarang">
        <button type="button" class="btn btn-info float-right" style="float: right; margin: 5px"><i class="fas fa-plus"></i>  Tambah Data Barang</button>
      </a><br>
    </div>
    <div>
    <form id="frm-example" action="/barang" method="POST">
    <table id="example" class="display" cellspacing="0" width="100%">
    <thead>
              <tr>
                  <th><input name="select_all" value="1" id="example-select-all" type="checkbox" /></th>
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
<hr>

<p>Press <b>Submit</b> and check console for URL-encoded form data that would be submitted.</p>

<p><button>Submit</button></p>

<b>Data submitted to the server:</b><br>
<pre id="example-console"></pre>


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
             return '<input type="checkbox" name="id[]" value="' 
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
    
   $('#frm-example').on('submit', function(e){
      var favorite = [];
      $.each($("input[type='checkbox']:checked"), function(){
          favorite.push($(this).val());
      });
      // alert("My favourite sports are: " + favorite.join(", "));
      $('#example-console').text(favorite.join(","));

      e.preventDefault();

      if(favorite){
        $.ajax({
          type:"GET",
          url:"{{url('generate-pdf')}}?id_barang="+favorite,
          // success:function(res){        
          // if(res){
          //   $("#district").empty();
          //   $("#subdistrict").empty();
          //   $("#district").append('<option>Select District</option>');
          //   $.each(res,function(key,value){
          //     $("#district").append('<option value="'+key+'">'+value+'</option>');
          //   });
          
          // }else{
          //   $("#district").empty();
          // }
          // }
        });
      }

   });

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