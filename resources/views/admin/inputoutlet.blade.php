@extends('admin.templates.index')
@section('title', 'outlet | Laundry')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col">
                <form action="{{ route('addoutlet') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Alamat</label>
                        <input type="text" class="form-control" name="alamat">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Telepon</label>
                        <input type="text" class="form-control" name="telepon">
                    </div>
                    <button type="submit" class="btn btn-primary">Selesai</button>
                </form>
            </div>
        </div>
    </div>

@endsection
