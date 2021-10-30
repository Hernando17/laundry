@extends('admin.templates.index')
@section('title', 'Edit Outlet | Laundry')
@section('content')

    <div class="container col-5 mt-5">
        <form action="{{ route('editoutletactadmin', $out->id) }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                    value="{{ old('nama', $out->nama) }}">
                @error('nama')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Alamat</label>
                <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat"
                    value="{{ old('alamat', $out->alamat) }}">
                @error('alamat')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Telepon</label>
                <input type="text" class="form-control @error('telepon') is-invalid @enderror" name="telepon"
                    value="{{ old('telepon', $out->telepon) }}">
                @error('telepon')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <a href="{{ route('produkadmin') }}" class="btn btn-primary">Kembali</a>
            <button type="submit" class="btn btn-success">Selesai</button>
        </form>
    </div>


@endsection
