@extends('admin.templates.index')
@section('title', 'Produk | Laundry')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col">
                <a href="{{ route('inputlaporanadmin') }}" class="btn btn-success mt-5 mb-3">+</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">ID Transaksi</th>
                            <th scope="col">ID paket</th>
                            <th scope="col">Qty</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($laporan as $out)
                            <tr>
                                <th scope="row">{{ !empty($i) ? ++$i : ($i = 1) }}</th>
                                <td>{{ $out->id_transaksi }}</td>
                                <td>{{ $out->id_paket }}</td>
                                <td>{{ $out->qty }}</td>
                                <td>{{ $out->keterangan }}</td>
                                <td>
                                    <a href="{{ route('editlaporanadmin', $out->id) }}" class="btn btn-primary">Ubah</a>
                                    <a href="{{ route('printlaporanadmin', $out->id) }}" class="btn btn-dark">Print</a>
                                    <form action="{{ route('deletelaporanadmin', $out->id) }}" style="display:inline;">
                                        @csrf
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal">
                                            Hapus
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin?
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Menghapus ingin menghapus {{ $out->nama_paket }} ?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
