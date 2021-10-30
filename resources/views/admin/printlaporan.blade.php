<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan</title>
    <link rel="stylesheet" href="{{ asset('assets') }}/css/bootstrap.min.css">
</head>

<body>
    <div class="container align-items-center bg-secondary">
        <h1>LAPORAN</h1>
        <br>
        <p>ID Transaksi : {{ $out->id_transaksi }}</p>
        <p>ID Paket : {{ $out->id_paket }}</p>
        <p>Qty : {{ $out->qty }}</p>
        <p>Keterangan : {{ $out->keterangan }}</p>
    </div>
</body>
<footer>
    <script>
        window.print();
    </script>
</footer>

</html>
