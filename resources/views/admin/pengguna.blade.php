@extends('admin.templates.index')
@section('title', 'Pengguna | Laundry')
@section('content')

    <div class="container" style="padding:50px;">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Username</th>
                    <th scope="col">ID Outlet</th>
                    <th scope="col">Role</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pengguna as $out)
                    <tr>
                        <th scope="row">{{ !empty($i) ? ++$i : ($i = 1) }}</th>
                        <td>{{ $out->nama }}</td>
                        <td>{{ $out->username }}</td>
                        <td>{{ $out->id_outlet }}</td>
                        <td>{{ $out->role }}</td>
                        <td>
                            <a href="{{ route('editpenggunaadmin', $out->id) }}" class="btn btn-primary">Ubah</a>
                            <form action="{{ route('gantipasswordpenggunaadmin', $out->id) }}" style="display:inline;">
                                @csrf
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#passwordModal">
                                    Ubah Password
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="passwordModal" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Ganti Passowrd</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="password" class="form-label">Password</label>
                                                    <input type="password"
                                                        class="form-control @error('password') is-invalid @enderror"
                                                        name="password" value="{{ old('password') }}">
                                                    @error('password')
                                                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-warning">Konfirmasi</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </form>
                            <form action="{{ route('deletepenggunaadmin', $out->id) }}" style="display:inline;">
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
                                                Menghapus ingin menghapus {{ $out->username }} ?
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
@endsection
