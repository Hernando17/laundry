<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('assets') }}/css/bootstrap.min.css">
</head>

<body>
    <div class="container" style="padding:50px;">
        <div class="card col-7 m-auto" style="
            box-shadow: 0 1px 1px rgba(0,0,0,0.15), 
              0 2px 2px rgba(0,0,0,0.15), 
              0 4px 4px rgba(0,0,0,0.15), 
              0 8px 8px rgba(0,0,0,0.15);
            ">
            <div class="card-body">
                <form action="{{ route('store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control @error('username') is-invalid @enderror" id="username"
                            aria-describedby="username" name="username" value="{{ old('username') }}">
                        @error('username')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                            aria-describedby="nama" name="nama" value="{{ old('nama') }}">
                        @error('nama')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select id="Select" class="form-select @error('role') is-invalid @enderror" name="role"
                            value="{{ old('role') }}">
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
                    <div class="mb-3">
                        <label for="id_outlet" class="form-label">ID Outlet</label>
                        <select id="Select" class="form-select @error('id_outlet') is-invalid @enderror"
                            name="id_outlet" value="{{ old('id_outlet') }}">
                            @foreach ($user as $out)
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
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                            id="password" name="password" value="{{ old('password') }}">
                        @error('password')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <br>
                    <a href="{{ route('index') }}" class="btn btn-primary">Kembali</a>
                    <button type="submit" class="btn btn-success">Daftar</button>
                </form>
            </div>
        </div>
    </div>

</body>
<footer>
    <script href="{{ asset('assets') }}/js/bootstrap.min.js"></script>
</footer>

</html>
