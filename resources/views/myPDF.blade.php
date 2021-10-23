<!DOCTYPE html>
<html>
<head>
    <title>Barcode</title>

    <style>
        .text-center{
            text-align: center;
        }
        td{
            padding: 7px;
        }
    </style>
</head>
<body>
@php
    $generatorPNG = new Picqer\Barcode\BarcodeGeneratorPNG();
    $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
@endphp
<table width="100%" style>
    <tr>
        @foreach($barang as $data)
        <td style="text-align: center">
            <img src="data:image/png;base64,{{ base64_encode($generatorPNG->getBarcode($data->id_barang, $generatorPNG::TYPE_CODE_128)) }}"><br>
            <!-- {!! $generator->getBarcode($data->id_barang, $generator::TYPE_CODE_128) !!} -->
            {{ $data->id_barang }}<br>
            {{ $data->nama }}
        </td>
        @if ($no++ % 5 == 0)
            </tr><tr>
        @endif
        @endforeach
    </tr>
</table>

</body>
</html>