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
    {{ Auth::user()->provider_id }} <br>
    {{ Auth::user()->name }} <br>
    <img src="{{ Auth::user()->avatar }}"alt="{{ Auth::user()->name }}"><br>
    {{ Auth::user()->email }} <br>
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