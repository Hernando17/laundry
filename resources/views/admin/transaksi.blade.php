@extends('admin.templates.index')
@section('title', 'Transaksi | Laundry')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col">
                <a href="{{ route('inputtransaksiadmin') }}" class="btn btn-success mt-5 mb-3">+</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">ID Outlet</th>
                            <th scope="col">Kode Invoice</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Batas Waktu</th>
                            <th scope="col">Status</th>
                            <th scope="col">Dibayar</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transaksi as $out)
                            <tr>
                                <th scope="row">{{ !empty($i) ? ++$i : ($i = 1) }}</th>
                                <td>{{ $out->id_outlet }}</td>
                                <td>{{ $out->kode_invoice }}</td>
                                <td>{{ $out->tgl }}</td>
                                <td>{{ $out->batas_waktu }}</td>
                                <td>{{ $out->status }}</td>
                                <td>{{ $out->dibayar }}</td>
                                <td>
                                    <a href="{{ route('edittransaksiadmin', $out->id) }}" class="btn btn-primary">Ubah</a>
                                    <form action="{{ route('deletetransaksiadmin', $out->id) }}" style="display:inline;">
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
                                                        Menghapus ingin menghapus {{ $out->kode_invoice }} ?
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
