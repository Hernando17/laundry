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
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($outlet as $out)
                            <tr>
                                <th scope="row">{{ $out->id }}</th>
                                <td>{{ $out->nama }}</td>
                                <td>{{ $out->alamat }}</td>
                                <td>{{ $out->telepon }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
