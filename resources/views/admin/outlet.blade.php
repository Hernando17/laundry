@extends('admin.templates.index')
@section('title', 'Outlet | Laundry')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col">
                <a href="{{ route('inputoutletadmin') }}" class="btn btn-success mt-5 mb-3">+</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Telepon</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($outlet as $out)
                            <tr>
                                <th scope="row">{{ !empty($i) ? ++$i : ($i = 1) }}</th>
                                <td>{{ $out->nama }}</td>
                                <td>{{ $out->alamat }}</td>
                                <td>{{ $out->telepon }}</td>
                                <td>
                                    <a href="{{ route('editoutletadmin', $out->id) }}" class="btn btn-primary">Ubah</a>
                                    <form style="display:inline" action="{{ route('deleteoutletadmin', $out->id) }}">
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
                                                        Menghapus ingin menghapus {{ $out->nama }} ?
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
