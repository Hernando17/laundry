@extends('admin.templates.index')
@section('title', 'Input Transaksi | Laundry')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col">
                <form action="{{ route('addtransaksiadmin') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="id_outlet" class="form-label">ID Outlet</label>
                        <select id="Select" class="form-select @error('id_outlet') is-invalid @enderror" name="id_outlet"
                            value="{{ old('id_outlet') }}">
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
                        <label for="kode_invoice" class="form-label">Kode Invoice</label>
                        <input type="text" class="form-control @error('kode_invoice') is-invalid @enderror"
                            name="kode_invoice" value="{{ old('kode_invoice', $nomor) }}">
                        @error('kode_invoice')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="id_member" class="form-label">ID Member</label>
                        <select id="Select" class="form-select @error('id_member') is-invalid @enderror" name="id_member"
                            value="{{ old('id_member') }}">
                            @foreach ($member as $out)
                                <option>
                                    ({{ $out->id }})
                                    {{ $out->nama }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_member')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="tgl" class="form-label">Tanggal</label>
                        <input type="date" class="form-control @error('tgl') is-invalid @enderror" name="tgl"
                            value="{{ old('tgl') }}">
                        @error('tgl')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="batas_waktu" class="form-label">Batas Waktu</label>
                        <input type="date" class="form-control @error('batas_waktu') is-invalid @enderror"
                            name="batas_waktu" value="{{ old('batas_waktu') }}">
                        @error('batas_waktu')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="tgl_bayar" class="form-label">Tanggal Bayar</label>
                        <input type="date" class="form-control @error('tgl_bayar') is-invalid @enderror" name="tgl_bayar"
                            value="{{ old('tgl_bayar') }}">
                        @error('tgl_bayar')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="biaya_tambahan" class="form-label">Biaya Tambahan</label>
                        <input type="text" class="form-control @error('biaya_tambahan') is-invalid @enderror"
                            name="biaya_tambahan" value="{{ old('biaya_tambahan') }}">
                        @error('biaya_tambahan')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="diskon" class="form-label">Diskon</label>
                        <input type="text" class="form-control @error('diskon') is-invalid @enderror" name="diskon"
                            value="{{ old('diskon') }}">
                        @error('diskon')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="pajak" class="form-label">Pajak</label>
                        <input type="text" class="form-control @error('pajak') is-invalid @enderror" name="pajak"
                            value="{{ old('pajak') }}">
                        @error('pajak')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select id="Select" class="form-select @error('status') is-invalid @enderror" name="status"
                            value="{{ old('status') }}">
                            <option>baru</option>
                            <option>proses</option>
                            <option>selesai</option>
                            <option>diambil</option>
                        </select>
                        @error('status')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="dibayar" class="form-label">Dibayar</label>
                        <select id="Select" class="form-select @error('dibayar') is-invalid @enderror" name="dibayar"
                            value="{{ old('dibayar') }}">
                            <option>dibayar</option>
                            <option>belum_dibayar</option>
                        </select>
                        @error('dibayar')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="id_user" class="form-label">ID User</label>
                        <select id="Select" class="form-select @error('id_user') is-invalid @enderror" name="id_user">
                            @foreach ($user as $out)
                                <option>
                                    ({{ $out->id }})
                                    {{ $out->nama }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_user')
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
