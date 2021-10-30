@extends('admin.templates.index')
@section('title', 'Input Produk | Laundry')
@section('content')

    <div class="container col-5 mt-5">
        <form action="{{ route('addprodukadmin') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="id_outlet" class="form-label">ID Outlet</label>
                <select id="Select" class="form-select @error('id_outlet') is-invalid @enderror" name="id_outlet">
                    @foreach ($outlet as $out)
                        <option>
                            ({{ $out->id }})
                            {{ $out->nama }}
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
                <label for="jenis" class="form-label">Jenis</label>
                <select id="Select" class="form-select @error('jenis') is-invalid @enderror" name="jenis"
                    value="{{ old('id_outlet') }}">
                    <option>Kaos</option>
                    <option>Selimut</option>
                    <option>Bed Cover</option>
                    <option>Kaos</option>
                    <option>Lain-lain</option>
                </select>
                @error('jenis')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="nama_paket" class="form-label">Nama Paket</label>
                <input type="text" class="form-control @error('nama_paket') is-invalid @enderror" name="nama_paket"
                    value="{{ old('nama_paket') }}">
                @error('nama_paket')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="text" class="form-control @error('harga') is-invalid @enderror" name="harga"
                    value="{{ old('harga') }}">
                @error('harga')
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
