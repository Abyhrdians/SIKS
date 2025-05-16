@extends('layouts.app')
@section('content')

<div class="container">
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <h3 class="fw-bold mb-3">Dashboard</h3>
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
                            <div class="col col-stats ms-3 ms-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Total Keuangan</p>
                                    <h4 class="card-title">RP 1.000.000</h4>
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
                                    <i class="fas fa-user-check"></i>
                                </div>
                            </div>
                            <div class="col col-stats ms-3 ms-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Uang Keluar</p>
                                    <h4 class="card-title">RP 0</h4>
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
                                    <i class="fas fa-luggage-cart"></i>
                                </div>
                            </div>
                            <div class="col col-stats ms-3 ms-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Uang Masuk</p>
                                    <h4 class="card-title">RP 1.000.000</h4>
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
                            <div class="col col-stats ms-3 ms-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Total Transaksi</p>
                                    <h4 class="card-title">576</h4>
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
                            <h4 class="card-title">5 Transaksi Yang Terbaru</h4>
                            <div class="card-tools">
                                <button class="btn btn-icon btn-link btn-primary btn-xs"><span
                                        class="fa fa-angle-down"></span></button>
                                <button
                                    class="btn btn-icon btn-link btn-primary btn-xs btn-refresh-card"><span
                                        class="fa fa-sync-alt"></span></button>
                                <button class="btn btn-icon btn-link btn-primary btn-xs"><span
                                        class="fa fa-times"></span></button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive table-hover table-sales">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Jenis Transaksi</th>
                                                <th>Nama Transaksi</th>
                                                <th>Kategori Transaksi</th>
                                                <th>Transaksi Saldo</th>
                                                <th>Tanggal Transkasi</th>
                                                <th class="text-center">Tautan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Uang Masuk</td>
                                                <td>Donasi Pembangunan</td>
                                                <td>Donasi</td>
                                                <td>Rp 5.000.000</td>
                                                <td>2025-04-10</td>
                                                <td class="text-center"><a href="#">Lihat</a></td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Uang Keluar</td>
                                                <td>Pembelian ATK</td>
                                                <td>Operasional</td>
                                                <td>Rp 750.000</td>
                                                <td>2025-04-12</td>
                                                <td class="text-center"><a href="#">Lihat</a></td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Uang Sekolah</td>
                                                <td>SPP Bulan April</td>
                                                <td>SPP</td>
                                                <td>Rp 350.000</td>
                                                <td>2025-04-01</td>
                                                <td class="text-center"><a href="#">Lihat</a></td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Uang Masuk</td>
                                                <td>Pemasukan dari Kantin</td>
                                                <td>Usaha Sekolah</td>
                                                <td>Rp 2.000.000</td>
                                                <td>2025-04-14</td>
                                                <td class="text-center"><a href="#">Lihat</a></td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>Uang Keluar</td>
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
                            {{-- <div class="col-md-6">
                                <div class="mapcontainer">
                                    <div id="world-map" class="w-100" style="height: 300px;"></div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
