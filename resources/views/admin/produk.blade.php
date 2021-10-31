@extends('admin.templates.index')
@section('title', 'Produk | Laundry')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col">
                <a href="{{ route('inputprodukadmin') }}" class="btn btn-success mt-5 mb-3">+</a>
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">ID Outlet</th>
                            <th scope="col">Jenis</th>
                            <th scope="col">Nama Paket</th>
                            <th scope="col">Harga</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produk as $out)
                            <tr>
                                <th scope="row">{{ !empty($i) ? ++$i : ($i = 1) }}</th>
                                <td>{{ $out->id_outlet }}</td>
                                <td>{{ $out->jenis }}</td>
                                <td>{{ $out->nama_paket }}</td>
                                <td>Rp {{ number_format($out->harga, 2, ',', '.') }}</td>
                                <td>
                                    <a href="{{ route('editprodukadmin', $out->id) }}" class="btn btn-primary">Ubah</a>
                                    <form action="{{ route('deleteprodukadmin', $out->id) }}" style="display:inline;">
                                        @csrf
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal{{ $out->id }}">
                                            Hapus
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{ $out->id }}" tabindex="-1"
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

                                </td>
                                </form>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
