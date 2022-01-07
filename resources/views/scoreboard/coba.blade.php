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
        <form >
        
        <div class="form-group">
            <label>home:</label>
            <input type="text" name="home" class="form-control" placeholder="home" required="">
        </div>

        <div class="form-group">
            <label>away:</label>
            <input type="text" name="away" class="form-control" placeholder="away" required="">
        </div>

        <div class="form-group">
            <strong>hc:</strong>
            <input type="text" name="hc" class="form-control" placeholder="hc" required="">
        </div>

        <div class="form-group">
            <button class="btn btn-success btn-submit">Submit</button>
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
<script type="text/javascript">
   
    // $.ajaxSetup({
    //     headers: {
    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //     }
    // });
   
    $(".btn-submit").click(function(e){
  
        e.preventDefault();
   
        // var token = $('meta[name="csrf-token"]').attr('content');
        
        var home = $("input[name=home]").val();
        var away = $("input[name=away]").val();
        var hc = $("input[name=hc]").val();
   
        $.ajax({
           type:'POST',
           url:"{{ route('ajaxRequest.post') }}",
           data:{"_token": "{{ csrf_token() }}",home:home, away:away, hc:hc},
           success:function(data){
              alert(data.success);
           }
        });
  
    });
</script>
@endsection