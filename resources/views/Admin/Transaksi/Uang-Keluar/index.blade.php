@extends('layouts.app')
@section('content')
<div class="container">
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <h3 class="fw-bold mb-3">Transaksi Uang Keluar</h3>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-round">
                    <div class="card-header">
                        <div class="card-head-row card-tools-still-right">
                            <div class="btn-group">
                                <a href="" class="btn btn-primary">Tambah Transaksi</a>
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
                                                <th>Nama Transaksi</th>
                                                <th>Kategori Transaksi</th>
                                                <th>Transaksi Saldo</th>
                                                <th>Tanggal Transkasi</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Donasi Pembangunan</td>
                                                <td>Donasi</td>
                                                <td>Rp 5.000.000</td>
                                                <td>2025-04-10</td>
                                                <td class="text-center"><a href="#">Lihat</a></td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Pembelian ATK</td>
                                                <td>Operasional</td>
                                                <td>Rp 750.000</td>
                                                <td>2025-04-12</td>
                                                <td class="text-center"><a href="#">Lihat</a></td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>SPP Bulan April</td>
                                                <td>SPP</td>
                                                <td>Rp 350.000</td>
                                                <td>2025-04-01</td>
                                                <td class="text-center"><a href="#">Lihat</a></td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Pemasukan dari Kantin</td>
                                                <td>Usaha Sekolah</td>
                                                <td>Rp 2.000.000</td>
                                                <td>2025-04-14</td>
                                                <td class="text-center"><a href="#">Lihat</a></td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>Perbaikan AC Kelas</td>
                                                <td>Perawatan</td>
                                                <td>Rp 1.200.000</td>
                                                <td>2025-04-09</td>
                                                <td class="text-center"><a href="#">Lihat</a></td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>Perbaikan AC Kelas</td>
                                                <td>Perawatan</td>
                                                <td>Rp 1.200.000</td>
                                                <td>2025-04-09</td>
                                                <td class="text-center"><a href="#">Lihat</a></td>
                                            </tr>
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

@push('scripts')
<!-- jQuery & DataTables JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

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
</script>
@endpush
@push('styles')
<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

@endpush

