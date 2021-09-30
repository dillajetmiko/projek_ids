<!DOCTYPE html>
<html>
<head>
    <title>Barcode</title>
</head>
<body>
@php
    $generatorPNG = new Picqer\Barcode\BarcodeGeneratorPNG();
@endphp
@foreach($barang as $data)
    <img src="data:image/png;base64,{{ base64_encode($generatorPNG->getBarcode($data->id_barang, $generatorPNG::TYPE_CODE_128)) }}"><br>
    {{ $data->id_barang }}<br>
    {{ $data->nama }}
    <br><br>
@endforeach
</body>
</html>