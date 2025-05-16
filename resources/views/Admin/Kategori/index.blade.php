@extends('layouts.app')
@section('content')
<div class="container">
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <h3 class="fw-bold mb-3">Kelola Data Kategori</h3>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-round">
                    <div class="card-header">
                        <div class="card-head-row card-tools-still-right">
                            <div class="btn-group">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addKategori">
                            Tambah Kategori
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
                                                <th>Kode Kategori</th>
                                                <th>Nama Kategori</th>
                                                <th>Tipe</th>
                                                <th>Keterangan</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($data as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->prefix_kode }}</td>
                                            <td>{{ $item->nama_kategori }}</td>
                                            <td>{{ ucfirst($item->tipe) }}</td>
                                            <td>{{ $item->deskripsi ?? '-' }}</td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <button type="button"
                                                    class="btn btn-warning btn-sm"
                                                    onclick="editKategori({{ $item->id }})">
                                                    Edit
                                                    </button>
                                                    @method('DELETE')
                                                    <a href="{{route('admin.kategori.destroy', $item->id)}}" class="btn btn-sm btn-danger" data-confirm-delete="true">Hapus</a>
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

@include('Admin.Kategori.add')
@include('Admin.Kategori.edit')

@push('scripts')
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

    function editKategori(id) {
        $.ajax({
            url: `/Kelola-kategori/edit/${id}`,
            type: 'GET',
            success: function (data) {
                // Set form action
                // const form = document.getElementById('editForm');
                // form.action = `/Kelola-kategori/update/${data.id}`;
                // form.method = 'POST';

                // document.getElementById('edit_id').value = data.id;
                // document.getElementById('edit_kode_kategori').value = data.prefix_kode;
                // document.getElementById('edit_nama').value = data.nama_kategori;
                // document.getElementById('edit_tipe').value = data.tipe;
                // document.getElementById('edit_keterangan').value = data.deskripsi;
                $('#editForm')
                    .attr('action', `/Kelola-kategori/update/${data.id}`)
                    .attr('method', 'POST');

                $('#edit_id').val(data.id);
                $('#edit_kode_kategori').val(data.prefix_kode);
                $('#edit_nama').val(data.nama_kategori);
                $('#edit_tipe').val(data.tipe);
                $('#edit_keterangan').val(data.deskripsi);

                $('#EditKategori').modal('show');
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

