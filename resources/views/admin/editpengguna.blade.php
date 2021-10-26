@extends('admin.templates.index')
@section('title', 'Edit Pengguna | Laundry')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col">
                <form action="{{ route('editpenggunaadminact', $pengguna->id) }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                            value="{{ old('nama', $pengguna->nama) }}">
                        @error('nama')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control @error('username') is-invalid @enderror" name="username"
                            value="{{ old('nama_paket', $pengguna->username) }}">
                        @error('username')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="id_outlet" class="form-label">ID Outlet</label>
                        <select id="Select" class="form-select @error('id_outlet') is-invalid @enderror" name="id_outlet">
                            <option>
                                {{ old('id_outlet', $pengguna->id_outlet) }}
                            </option>
                            @foreach ($outlet as $o)
                                <option>
                                    ({{ $o->id }})
                                    {{ $o->nama }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_outlet')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select id="Select" class="form-select @error('role') is-invalid @enderror" name="role">
                            <option>{{ old('role', $pengguna->role) }}</option>
                            <option>admin</option>
                            <option>kasir</option>
                            <option>owner</option>
                        </select>
                        @error('role')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Selesai</button>
                </form>
            </div>
        </div>
    </div>

@endsection
