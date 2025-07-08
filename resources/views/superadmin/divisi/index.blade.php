@extends('layouts.superadmin')

@section('content')
<div class="container">
    <div class="page-header">
        <h4 class="page-title">Data Divisi</h4>
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
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-header">
            <!-- Form Tambah Divisi -->
            <form action="{{ route('divisi.store') }}" method="POST" class="mb-4">
                @csrf
                <div class="input-group">
                    <input type="text" name="name" class="form-control" placeholder="Nama Divisi" required>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
        <div class="card-body">
            <!-- Table Divisi -->
            <div class="table-responsive">
                <table id="add-row" class="display table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Divisi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($divisis as $divisi)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $divisi->name }}</td>
                            <td>
                                <!-- Tombol Edit -->
                                <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editModal{{ $divisi->id }}">Edit</button>
        
                                <!-- Tombol Hapus -->
                                <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $divisi->id }}">Hapus</button>
                            </td>
                        </tr>
        
                        <!-- Modal Edit -->
                        <div class="modal fade" id="editModal{{ $divisi->id }}" tabindex="-1" aria-labelledby="editLabel{{ $divisi->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <form action="{{ route('divisi.update', $divisi->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit Divisi</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="text" name="name" class="form-control" value="{{ $divisi->name }}" required>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
        
                        <!-- Modal Delete -->
                        <div class="modal fade" id="deleteModal{{ $divisi->id }}" tabindex="-1" aria-labelledby="deleteLabel{{ $divisi->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <form action="{{ route('divisi.destroy', $divisi->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Hapus Divisi</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                                        </div>
                                        <div class="modal-body">
                                            Yakin ingin menghapus divisi <strong>{{ $divisi->name }}</strong>?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection
