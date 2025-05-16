@extends('layouts.app')
@section('content')
<div class="container">
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <h3 class="fw-bold mb-3">Kelola Pengguna</h3>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-round">
                    <div class="card-header">
                        <div class="card-head-row card-tools-still-right">
                            <div class="btn-group">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPengguna">
                            Tambah Pengguna
                            </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive table-hover table-sales">
                                    <table class="table table-bordered table-striped"id="example">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama </th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th>Foto</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data as $key => $item)
                                            <tr>
                                                <td>{{$key + 1}}</td>
                                                <td>{{$item->name}}</td>
                                                <td>{{$item->email}}</td>
                                                <td>
                                                    @if($item->role == 1)
                                                    Staff
                                                    @elseif($item->role == 2)
                                                    Kepala Sekolah
                                                    @elseif($item->role == 0)
                                                    Admin
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    <img src="{{ asset('storage/' . $item->foto) }}" alt="Foto" class="img-fluid rounded" style="width: 50px; height: 50px; object-fit: cover;">
                                                </td>
                                                <td>
                                                    <div class="btn-group">
                                                        <button type="button"
                                                        class="btn btn-warning btn-sm"
                                                        onclick="editPengguna({{ $item->id }})">
                                                        Edit
                                                        </button>
                                                        @method('DELETE')
                                                        <a href="{{route('admin.kelola-pengguna.destroy', $item->id)}}" class="btn btn-sm btn-danger" data-confirm-delete="true">Hapus</a>
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
            </div>
        </div>
    </div>
</div>
@endsection

@include('Admin.Kelola_pengguna.add')
@include('Admin.Kelola_pengguna.edit')

@push('scripts')
<!-- jQuery & DataTables JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#example').DataTable({
            responsive: true,
            lengthMenu: [5, 10, 25, 50, 100],
            language: {
                search: "Cari:",
                lengthMenu: "Tampilkan _MENU_ data",
                info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                paginate: {
                    previous: "Sebelumnya",
                    next: "Selanjutnya"
                },
                zeroRecords: "Data tidak ditemukan",
                infoEmpty: "Tidak ada data yang ditampilkan",
                infoFiltered: "(difilter dari _MAX_ total data)"
            }
        });
    });
    function editPengguna(id) {
        $.ajax({
            url: `/Kelola-pengguna/edit/${id}`,
            type: 'GET',
            success: function (data) {
                $('#editForm')
                    .attr('action', `/Kelola-pengguna/update/${data.id}`)
                    .attr('method', 'POST');
                $('#edit_nama').val(data.name);
                $('#edit_email').val(data.email);
                $('#edit_role').val(data.role);
                $('#editPengguna').modal('show');
            },
            error: function () {
                alert('Gagal mengambil data.');
            }
        });
    }
</script>
@endpush
@push('styles')

@endpush

