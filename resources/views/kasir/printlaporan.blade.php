<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan</title>
    <link rel="stylesheet" href="{{ asset('assets') }}/css/style.css">
</head>

<body>
    <div class="container">
        <h1 class="judul">LAUNDRY CUCI BERSIH</h1>
        <hr>
        <h2 class="judul">LAPORAN</h2>
        <br>
        <table class="panjang">
            <tr>
                <th>ID Transaksi</th>
                <th>ID Paket</th>
                <th>Qty</th>
                <th>Keterangan</th>
            </tr>
            <tr>
                <td>{{ $out->id_transaksi }}</td>
                <td>{{ $out->id_paket }}</td>
                <td>{{ $out->qty }}</td>
                <td>{{ $out->keterangan }}</td>
            </tr>
        </table>
    </div>
</body>
<footer>
    <script>
        window.print();
    </script>
</footer>

</html>
