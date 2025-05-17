@extends('layouts.app')
@section('content')
<div class="container">
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <h3 class="fw-bold mb-3">Transaksi Uang Masuk</h3>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-4">
                <div class="card card-stats card-round">
                    <div class="card-body ">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-primary bubble-shadow-small">
                                    <i class="fas fa-users"></i>
                                </div>
                            </div>
                            <div class="col col-stats ms-3 ms-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Total Keuangan</p>
                                    <h4 class="card-title">RP {{ number_format($totalKeuangan, 0, ',', '.') }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-info bubble-shadow-small">
                                    <i class="fas fa-user-check"></i>
                                </div>
                            </div>
                            <div class="col col-stats ms-3 ms-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Uang Masuk</p>
                                    <h4 class="card-title">RP {{ number_format($UangMasuk, 0, ',', '.') }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-success bubble-shadow-small">
                                    <i class="fas fa-luggage-cart"></i>
                                </div>
                            </div>
                            <div class="col col-stats ms-3 ms-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Uang Keluar</p>
                                    <h4 class="card-title">RP {{ number_format($UangKeluar, 0, ',', '.') }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-round">
                    <div class="card-header">
                        <div class="card-head-row card-tools-still-right">
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTransaksi">
                            Tambah Transaksi
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
                                                <th>Kode Transaksi</th>
                                                <th>Tanggal</th>
                                                <th>Kategori</th>
                                                <th>Nama Transaksi</th>
                                                <th>Jumlah Rp.</th>
                                                <th>Keterangan</th>
                                                <th>Diinput oleh</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($data as $key => $item)
                                            <tr>
                                                <td>{{$key + 1}}</td>
                                                <td>{{$item->kode_transaksi}}</td>
                                                <td>{{$item->tanggal}}</td>
                                                <td>{{$item->kategori->nama_kategori}}</td>
                                                <td>{{$item->nama_transaksi}}</td>
                                                <td>{{ number_format($item->jumlah, 0, ',', '.') }}</td>
                                                <td>{{$item->keterangan ?? '--'}}</td>
                                                <td>{{$item->user->name}}</td>
                                                <td>
                                                     <div class="btn-group">
                                                        <button type="button"
                                                        class="btn btn-warning btn-sm"
                                                        onclick="editTransaksi({{ $item->id }})">
                                                        Edit
                                                        </button>
                                                        @method('DELETE')
                                                        <a href="{{route('admin.uangmasuk.destroy', $item->id)}}" class="btn btn-sm btn-danger" data-confirm-delete="true">Hapus</a>
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

@include('Admin.Transaksi.Uang-Masuk.add')
@include('Admin.Transaksi.Uang-Masuk.edit')

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
    function editTransaksi(id) {
        $.ajax({
            url: `/Transaksi/uang-masuk/data/${id}`,
            type: 'GET',
            success: function (data) {
                $('#editForm')
                    .attr('action', `/Transaksi/uang-masuk/update/${data.id}`)
                    .attr('method', 'POST');
                    $('#edit_kategori').val(data.kategori_id);
                    $('#edit_nama').val(data.nama_transaksi);
                    $('#edit_jumlah').val(data.jumlah);
                    $('#edit_tanggal').val(data.tanggal);
                    $('#edit_keterangan').val(data.keterangan);

                $('#editTransaksi').modal('show');
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

