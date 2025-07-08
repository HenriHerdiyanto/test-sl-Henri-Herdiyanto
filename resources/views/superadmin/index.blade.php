@extends('layouts.superadmin')

@section('content')
<div class="container">
    <div class="page-header">
        <h4 class="page-title">Dashboard</h4>
        <div class="btn-group btn-group-page-header ml-auto">
            <button type="button"
                class="btn btn-light btn-round btn-page-header-dropdown dropdown-toggle"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-ellipsis-h"></i>
            </button>
            <div class="dropdown-menu">
                <div class="arrow"></div>
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Separated link</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body ">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-primary bubble-shadow-small">
                                <i class="fas fa-users"></i>
                            </div>
                        </div>
                        <div class="col col-stats ml-3 ml-sm-0">
                            <div class="numbers">
                                <p class="card-category">Visitors</p>
                                <h4 class="card-title">1,294</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-info bubble-shadow-small">
                                <i class="far fa-newspaper"></i>
                            </div>
                        </div>
                        <div class="col col-stats ml-3 ml-sm-0">
                            <div class="numbers">
                                <p class="card-category">Subscribers</p>
                                <h4 class="card-title">1303</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-success bubble-shadow-small">
                                <i class="far fa-chart-bar"></i>
                            </div>
                        </div>
                        <div class="col col-stats ml-3 ml-sm-0">
                            <div class="numbers">
                                <p class="card-category">Sales</p>
                                <h4 class="card-title">$ 1,345</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-secondary bubble-shadow-small">
                                <i class="far fa-check-circle"></i>
                            </div>
                        </div>
                        <div class="col col-stats ml-3 ml-sm-0">
                            <div class="numbers">
                                <p class="card-category">Order</p>
                                <h4 class="card-title">576</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h4 class="card-title">Data Pegawai</h4>
                    <button class="btn btn-primary btn-round ml-auto" data-toggle="modal"
                        data-target="#addRowModal">
                        <i class="fa fa-plus"></i>
                        Add Row
                    </button>
                </div>
            </div>
            <div class="card-body">
                <!-- Modal -->
                <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header no-bd">
                                <h5 class="modal-title">
                                    <span class="fw-mediumbold">
                                        New</span>
                                    <span class="fw-light">
                                        Row
                                    </span>
                                </h5>
                                <button type="button" class="close" data-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="{{ route('AddPegawai') }}">
                                    @csrf
                                    <!-- Name -->
                                    <div class="row mb-3">
                                        <label for="name" class="col-md-4 col-form-label text-md-end">Name</label>
                                        <div class="col-md-6">
                                            <input id="name" type="text" 
                                                class="form-control @error('name') is-invalid @enderror" 
                                                name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                            @error('name')
                                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Email -->
                                    <div class="row mb-3">
                                        <label for="email" class="col-md-4 col-form-label text-md-end">Email</label>
                                        <div class="col-md-6">
                                            <input id="email" type="email" 
                                                class="form-control @error('email') is-invalid @enderror" 
                                                name="email" value="{{ old('email') }}" required autocomplete="email">

                                            @error('email')
                                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Role -->
                                    <div class="row mb-3">
                                        <label for="role" class="col-md-4 col-form-label text-md-end">Role</label>
                                        <div class="col-md-6">
                                            <select id="role" name="role" class="form-control @error('role') is-invalid @enderror" required>
                                                <option value="">-- Pilih Role --</option>
                                                <option value="staff" {{ old('role') == 'staff' ? 'selected' : '' }}>Staff</option>
                                                <option value="manager" {{ old('role') == 'manager' ? 'selected' : '' }}>Manager</option>
                                                <option value="superadmin" {{ old('role') == 'superadmin' ? 'selected' : '' }}>Superadmin</option>
                                            </select>

                                            @error('role')
                                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="id_divisi" class="col-md-4 col-form-label text-md-end">Divisi</label>
                                        <div class="col-md-6">
                                            <select name="id_divisi" class="form-control" id="id_divisi">
                                                <option value="">-- Pilih Divisi --</option>
                                                @foreach($divisis as $divisi)
                                                    <option value="{{ $divisi->id }}" {{ old('id_divisi', $item->id_divisi ?? '') == $divisi->id ? 'selected' : '' }}>
                                                        {{ $divisi->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Phone -->
                                    <div class="row mb-3">
                                        <label for="phone" class="col-md-4 col-form-label text-md-end">Phone</label>
                                        <div class="col-md-6">
                                            <input id="phone" type="text" 
                                                class="form-control @error('phone') is-invalid @enderror" 
                                                name="phone" value="{{ old('phone') }}" required>

                                            @error('phone')
                                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Address -->
                                    <div class="row mb-3">
                                        <label for="address" class="col-md-4 col-form-label text-md-end">Address</label>
                                        <div class="col-md-6">
                                            <textarea id="address" name="address" 
                                                class="form-control @error('address') is-invalid @enderror" 
                                                required>{{ old('address') }}</textarea>

                                            @error('address')
                                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Password -->
                                    <div class="row mb-3">
                                        <label for="password" class="col-md-4 col-form-label text-md-end">Password</label>
                                        <div class="col-md-6">
                                            <input id="password" type="password" 
                                                class="form-control @error('password') is-invalid @enderror" 
                                                name="password" required autocomplete="new-password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Confirm Password -->
                                    <div class="row mb-3">
                                        <label for="password-confirm" class="col-md-4 col-form-label text-md-end">Confirm Password</label>
                                        <div class="col-md-6">
                                            <input id="password-confirm" type="password" 
                                                class="form-control" name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                    </div>

                                    <!-- Submit -->
                                    <div class="row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                Register
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table id="add-row" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Divisi</th>
                                <th style="width: 10%">Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Divisi</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($dataUser as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->role }}</td>
                                    <td>{{ $item->divisi->name }}</td>
                                    <td>
                                        <div class="form-button-action">
                                            <button type="button" class="btn btn-link btn-primary btn-lg"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#editModal{{ $item->id }}"
                                                    title="Edit Data">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            <!-- Modal Edit -->
                                            <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $item->id }}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <form action="{{ route('UpdatePegawai', $item->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                            <h5 class="modal-title" id="editModalLabel{{ $item->id }}">Edit Data Pegawai</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">

                                                                <!-- Name -->
                                                                <div class="mb-3">
                                                                    <label for="name{{ $item->id }}" class="form-label">Name</label>
                                                                    <input type="text" class="form-control" name="name" id="name{{ $item->id }}" value="{{ $item->name }}" required>
                                                                </div>

                                                                <!-- Email -->
                                                                <div class="mb-3">
                                                                    <label for="email{{ $item->id }}" class="form-label">Email</label>
                                                                    <input type="email" class="form-control" name="email" id="email{{ $item->id }}" value="{{ $item->email }}" required>
                                                                </div>

                                                                <!-- Role -->
                                                                <div class="mb-3">
                                                                    <label for="role{{ $item->id }}" class="form-label">Role</label>
                                                                    <select name="role" class="form-control" id="role{{ $item->id }}">
                                                                    <option value="staff" {{ $item->role == 'staff' ? 'selected' : '' }}>Staff</option>
                                                                    <option value="manager" {{ $item->role == 'manager' ? 'selected' : '' }}>Manager</option>
                                                                    <option value="superadmin" {{ $item->role == 'superadmin' ? 'selected' : '' }}>Superadmin</option>
                                                                    </select>
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="id_divisi" class="form-label">Divisi</label>
                                                                    <select name="id_divisi" class="form-control" id="id_divisi">
                                                                        <option value="">-- Pilih Divisi --</option>
                                                                        @foreach($divisis as $divisi)
                                                                            <option value="{{ $divisi->id }}" {{ old('id_divisi', $item->id_divisi ?? '') == $divisi->id ? 'selected' : '' }}>
                                                                                {{ $divisi->name }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>


                                                                <!-- Phone -->
                                                                <div class="mb-3">
                                                                    <label for="phone{{ $item->id }}" class="form-label">Phone</label>
                                                                    <input type="text" class="form-control" name="phone" id="phone{{ $item->id }}" value="{{ $item->phone }}">
                                                                </div>

                                                                <!-- Address -->
                                                                <div class="mb-3">
                                                                    <label for="address{{ $item->id }}" class="form-label">Address</label>
                                                                    <textarea class="form-control" name="address" id="address{{ $item->id }}">{{ $item->address }}</textarea>
                                                                </div>

                                                                <!-- password -->
                                                                <div class="mb-3">
                                                                    <label for="password{{ $item->id }}" class="form-label">password</label>
                                                                    <input type="text" class="form-control" name="password" id="password{{ $item->id }}" placeholder="Kosongkan jika tidak di ubah">
                                                                </div>

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>

                                            <!-- Tombol Delete -->
                                            <button type="button" class="btn btn-link btn-danger"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#deleteModal{{ $item->id }}"
                                                    title="Hapus Data">
                                                <i class="fa fa-times"></i>
                                            </button>
                                            <!-- Modal Konfirmasi Hapus -->
                                            <div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $item->id }}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <form action="{{ route('DeletePegawai', $item->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="deleteModalLabel{{ $item->id }}">Konfirmasi Hapus</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                            Apakah Anda yakin ingin menghapus pegawai <strong>{{ $item->name }}</strong>?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>

                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
