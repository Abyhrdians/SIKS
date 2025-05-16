@extends('layouts.app')
@section('content')
<div class="container">
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <h3 class="fw-bold mb-3">Kelola Data Siswa</h3>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-round">
                    <div class="card-header">
                        <div class="card-head-row card-tools-still-right">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSiswa">
                                Tambah Siswa
                            </button>
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
                                                <th>Nama Siswa</th>
                                                <th>Kelas</th>
                                                <th>Nama Orang Tua</th>
                                                <th>Nomor Telp Orang Tua</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data as $key => $item)
                                            <tr>
                                                <td>{{$key + 1}}</td>
                                                <td>{{$item->nama_siswa}}</td>
                                                <td>{{$item->kelas}}</td>
                                                <td>{{$item->orangtua->nama_ortu}}</td>
                                                <td>{{$item->orangtua->nomor_telp}}</td>
                                                <td>

                                                    <div class="btn-group">
                                                        <button type="button"
                                                        class="btn btn-info btn-sm"
                                                        onclick="detailSiswa({{ $item->id }})">
                                                        Detail
                                                        </button>
                                                        <button type="button"
                                                        class="btn btn-warning btn-sm"
                                                        onclick="editSiswa({{ $item->id }})">
                                                        Edit
                                                        </button>
                                                        @method('DELETE')
                                                        <a href="{{route('admin.kelola-siswa.destroy', $item->id)}}" class="btn btn-sm btn-danger" data-confirm-delete="true">Hapus</a>
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

@include('Admin.Kelola-Siswa.add')
@include('Admin.Kelola-Siswa.edit')
@include('Admin.Kelola-Siswa.Detail')

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
    $('#cekNik').on('click', function () {
        let nik = $('#nik').val();
        let statusEl = $('#nik-status');

        statusEl
            .removeClass('text-success text-danger')
            .text('Mencari data...');

        if (!nik) {
            statusEl
                .addClass('text-danger')
                .text('Silakan masukkan NIK terlebih dahulu.');
            return;
        }
        $.ajax({
            url: `/Kelola-Data-Siswa/cek-nik`,
            method: 'GET',
            data: { nik: nik },
            success: function (data) {
                if (data.found) {
                    $('#nama_ortu').val(data.nama_ortu).prop('disabled', false);
                    $('#nomor_telp_ortu').val(data.nomor_telp).prop('disabled', false);
                    $('#alamat_ortu').val(data.alamat).prop('disabled', false);
                    $('#pekerjaan').val(data.pekerjaan).prop('disabled', false);
                    statusEl
                        .addClass('text-success')
                        .text('Data ditemukan dan diisi otomatis.');
                } else {
                    $('#nama_ortu, #nomor_telp_ortu, #alamat_ortu, #pekerjaan').val('')
                    .prop('disabled', false);
                    statusEl
                        .addClass('text-danger')
                        .text('Data tidak ditemukan. Silakan isi manual.');
                }
            },
            error: function () {
                statusEl
                    .addClass('text-danger')
                    .text('Terjadi kesalahan saat memeriksa data.');
            }
        });
    });
    function nextStep() {
        document.getElementById('step-siswa').style.display = 'none';
        document.getElementById('step-ortu').style.display = 'block';
          document.getElementById('edit_step-siswa').style.display = 'none';
        document.getElementById('edit_step-ortu').style.display = 'block';
    }

    function prevStep() {
        document.getElementById('step-ortu').style.display = 'none';
        document.getElementById('step-siswa').style.display = 'block';
         document.getElementById('edit_step-ortu').style.display = 'none';
        document.getElementById('edit_step-siswa').style.display = 'block';
    }
    function editSiswa(id) {
        $.ajax({
            url: `/Kelola-Data-Siswa/data/${id}`,
            type: 'GET',
            success: function (data) {
                $('#editForm')
                    .attr('action', `/Kelola-Data-Siswa/update/${data.id}`)
                    .attr('method', 'POST');
                $('#edit_nisn').val(data.nisn);
                $('#edit_nama_siswa').val(data.nama_siswa);
                $('#edit_jk').val(data.jenis_kelamin);
                $('#nomor_telp_siswa').val(data.nomor_telp);
                $('#edit_kelas').val(data.kelas);
                $('#edit_tgl').val(data.tanggal_lahir);
                $('#edit_alamat_siswa').val(data.alamat);

                $('#edit_nik').val(data.orangtua.nik);
                $('#edit_nama_ortu').val(data.orangtua.nama_ortu);
                $('#edit_nomor_telp_ortu').val(data.orangtua.nomor_telp);
                $('#edit_pekerjaan').val(data.orangtua.pekerjaan);
                $('#edit_alamat_ortu').val(data.orangtua.alamat);
                $('#editSiswa').modal('show');
            },
            error: function () {
                alert('Gagal mengambil data.');
            }
        });
    }
    function detailSiswa(id) {
    $.ajax({
        url: `/Kelola-Data-Siswa/data/${id}`,
        type: 'GET',
        success: function (data) {
            $('#detail_nisn').val(data.nisn);
            $('#detail_nama_siswa').val(data.nama_siswa);
            $('#detail_jk').val(data.jenis_kelamin);
            $('#detail_nomor_telp_siswa').val(data.nomor_telp);
            $('#detail_kelas').val(data.kelas);
            $('#detail_tgl').val(data.tanggal_lahir);
            $('#detail_alamat_siswa').val(data.alamat);

            $('#detail_nik').val(data.orangtua.nik);
            $('#detail_nama_ortu').val(data.orangtua.nama_ortu);
            $('#detail_nomor_telp_ortu').val(data.orangtua.nomor_telp);
            $('#detail_pekerjaan').val(data.orangtua.pekerjaan);
            $('#detail_alamat_ortu').val(data.orangtua.alamat);

            $('#DetailSiswa').modal('show');
        },
        error: function () {
            alert('Gagal mengambil data.');
        }
    });
}

</script>
@endpush
@push('styles')
<!-- DataTables CSS -->

@endpush

