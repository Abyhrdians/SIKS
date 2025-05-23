  <div class="row">
            <div class="col-md-12">
                <div class="card card-round">
                    <div class="card-header">
                        <div class="card-head-row card-tools-still-right">
                            <h4>Daftar Laporan Transaksi Uang Masuk</h4>
                        </div>
                        <div class="">
                             <a href="{{ route('export.uangmasuk', [
                                'tgl_awal'  => request('tgl_awal'),
                                'tgl_akhir' => request('tgl_akhir'),
                            ]) }}" class="btn btn-success mb-3">
                            <i class="fas fa-file-excel"></i> Export Excel
                            </a>
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
                                                <th>Kategori</th>
                                                <th>Nama Transaksi</th>
                                                <th>Jumlah</th>
                                                <th>Tanggal</th>
                                                <th>Keterangan</th>
                                                <th>Di Input Oleh</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                         @foreach($data as $row)
                                            <tr>
                                                <td>{{ $loop->iteration}}</td>
                                                <td>{{ $row->kode_transaksi }}</td>
                                                <td>{{ $row->kategori->nama_kategori ?? '-' }}</td>
                                                <td>{{ $row->nama_transaksi}}</td>
                                                <td>Rp {{ number_format($row->jumlah, 0, ',', '.') }}</td>
                                                <td>{{ $row->tanggal }}</td>
                                                <td>{{ $row->keterangan }}</td>
                                                <td>{{ $row->user->name ?? '-' }}</td>
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
