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
                                    <h4 class="card-title">RP {{ number_format($totalKeuangan, 0, ',', '.') }}</h4>
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
                                    <h4 class="card-title">RP {{ number_format($UangKeluar, 0, ',', '.') }}</h4>
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
                                    <h4 class="card-title">RP {{ number_format($UangMasuk, 0, ',', '.') }}</h4>
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
                                    <p class="card-category">Uang Sekolah</p>
                                    <h4 class="card-title">RP {{ number_format($uangSekolah, 0, ',', '.') }}</h4>
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
                            <h4 class="card-title">10 Transaksi Uang Masuk/Keluar Terbaru</h4>
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
                                            <th>Kode Transaksi</th>
                                            <th>Tanggal</th>
                                            <th>Kategori</th>
                                            <th>Nama Transaksi</th>
                                            <th>Jenis</th>
                                            <th>Jumlah</th>
                                            <th>Staff</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($transaksiUmum as $i => $trx)
                                            <tr>
                                                <td>{{ $i + 1 }}</td>
                                                <td>{{ $trx->kode_transaksi }}</td>
                                                <td>{{ \Carbon\Carbon::parse($trx->tanggal)->format('d M Y') }}</td>
                                                <td>{{ $trx->kategori->nama_kategori ?? '-' }}</td>
                                                <td>{{ $trx->nama_transaksi }}</td>
                                                <td>
                                                    <span class="badge bg-{{ $trx->jenis == 1 ? 'success' : 'danger' }}">
                                                        {{ $trx->jenis == 1 ? 'Uang Masuk' : 'Uang Keluar' }}
                                                    </span>
                                                </td>
                                                <td>Rp {{ number_format($trx->jumlah, 0, ',', '.') }}</td>
                                                <td>{{ $trx->user->name ?? '-' }}</td>
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

         <div class="row">
            <div class="col-md-12">
                <div class="card card-round">
                    <div class="card-header">
                        <div class="card-head-row card-tools-still-right">
                            <h4 class="card-title">10 Transaksi Uang Sekolah</h4>
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
                                                <th>Kode Transaksi</th>
                                                <th>Tanggal</th>
                                                <th>Nama Siswa</th>
                                                <th>Kelas</th>
                                                <th>Jumlah</th>
                                                <th>Staff</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($transaksiUangSekolah as $i => $trx)
                                            <tr>
                                                <td>{{ $i + 1 }}</td>
                                                <td>{{ $trx->kode_transaksi }}</td>
                                                <td>{{ \Carbon\Carbon::parse($trx->tanggal_bayar)->format('d M Y') }}</td>
                                                <td>{{ $trx->siswa->nama_siswa ?? '-' }}</td>
                                                <td>{{ $trx->siswa->kelas ?? '-' }}</td>
                                                <td>Rp {{ number_format($trx->jumlah_bayar, 0, ',', '.') }}</td>
                                                <td>{{ $trx->user->name ?? '-' }}</td>
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
