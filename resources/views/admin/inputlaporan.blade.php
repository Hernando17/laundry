@extends('admin.templates.index')
@section('title', 'Input Laporan | Laundry')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col">
                <form action="{{ route('addlaporanadmin') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">id_transaksi</label>
                        <select id="Select" class="form-select @error('id_transaksi') is-invalid @enderror"
                            name="id_transaksi">
                            <option>
                                {{ old('id_transaksi', $laporan->id_paket) }}
                            </option>
                            @foreach ($transaksi as $out)
                                <option>
                                    ({{ $out->id }})
                                    {{ $out->kode_invoice }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_transaksi')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">id_paket</label>
                        <select id="Select" class="form-select @error('id_paket') is-invalid @enderror" name="id_paket">
                            <option>
                                {{ old('id_paket') }}
                            </option>
                            @foreach ($produk as $out)
                                <option>
                                    ({{ $out->id }})
                                    {{ $out->nama_paket }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_paket')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">qty</label>
                        <input type="text" class="form-control @error('qty') is-invalid @enderror" name="qty"
                            value="{{ old('qty') }}">
                        @error('qty')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">keterangan</label>
                        <input type="text" class="form-control @error('keterangan') is-invalid @enderror" name="keterangan"
                            value="{{ old('keterangan') }}">
                        @error('keterangan')
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
