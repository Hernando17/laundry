@extends('admin.templates.index')
@section('title', 'Edit Produk | Laundry')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col">
                <form action="{{ route('editprodukadminact', $produk->id) }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="id_outlet" class="form-label">ID outlet</label>
                        <select id="Select" class="form-select @error('id_outlet') is-invalid @enderror" name="id_outlet">
                            <option>
                                {{ old('id_outlet', $produk->id_outlet) }}
                            </option>
                            @foreach ($outlet as $o)
                                <option>
                                    ({{ $o->id }})
                                    {{ $o->nama }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_produklet')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="jenis" class="form-label">Jenis</label>
                        <select id="Select" class="form-select @error('jenis') is-invalid @enderror" name="jenis"
                            value="{{ old('id_produklet', $produk->id_outlet) }}">
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
                            value="{{ old('nama_paket', $produk->nama_paket) }}">
                        @error('nama_paket')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="text" class="form-control @error('harga') is-invalid @enderror" name="harga"
                            value="{{ old('harga', $produk->harga) }}">
                        @error('harga')
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
