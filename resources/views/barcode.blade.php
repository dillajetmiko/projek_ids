@extends("layout.mainlayout")

@section("page_title","IDS")

@section("title","Blank Page")

@section("custom_css")

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
    <h1>How to Generate Bar Code in Laravel? - ItSolutionStuff.com</h1>
    
    <h3>Product: 0001245259636</h3>
    @php
        $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
    @endphp
      
    {!! $generator->getBarcode('0001245259636', $generator::TYPE_CODE_128) !!}

    <h3>Product: 26092021001</h3>
    @php
        $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
    @endphp
      
    {!! $generator->getBarcode('26092021001', $generator::TYPE_CODE_128) !!}

    <h3>Product: 20210927099</h3>
    @php
        $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
    @endphp
      
    {!! $generator->getBarcode('20210927099', $generator::TYPE_CODE_128) !!}
      
      
    <h3>Product 2: 000005263635</h3>
    @php
        $generatorPNG = new Picqer\Barcode\BarcodeGeneratorPNG();
    @endphp
      
    <img src="data:image/png;base64,{{ base64_encode($generatorPNG->getBarcode('000005263635', $generatorPNG::TYPE_CODE_128)) }}">
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

@endsection