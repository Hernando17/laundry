@extends('admin.templates.index')
@section('title', 'Input Outlet | Laundry')
@section('content')

    <div class="container mt-5 col-5">
        <form action="{{ route('addoutletadmin') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                    value="{{ old('nama') }}">
                @error('nama')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Alamat</label>
                <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat"
                    value="{{ old('alamat') }}">
                @error('alamat')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Telepon</label>
                <input type="text" class="form-control @error('telepon') is-invalid @enderror" name="telepon"
                    value="{{ old('telepon') }}">
                @error('telepon')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <a href="{{ route('outletadmin') }}" class="btn btn-primary">Kembali</a>
            <button type="submit" class="btn btn-success">Selesai</button>
        </form>
    </div>

@endsection
