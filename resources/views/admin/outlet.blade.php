@extends('admin.templates.index')
@section('title', 'outlet | Laundry')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col">
                <a href="{{ route('inputoutlet') }}" class="btn btn-success mt-5 mb-3">+</a>
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
                                    <a href="#" class="btn btn-primary">Ubah</a>
                                    <form style="display:inline;" action="{{ route('deleteoutlet', $out->id) }}"
                                        method="post">
                                        @csrf
                                        <button class="btn btn-danger" type="submit">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
