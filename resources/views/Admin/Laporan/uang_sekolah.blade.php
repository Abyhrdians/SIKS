  <div class="row">
      <div class="col-md-12">
          <div class="card card-round">
              <div class="card-header">
                  <div class="card-head-row card-tools-still-right">
                      <h4>Daftar Laporan Transaksi Uang Sekolah</h4>
                  </div>
                  <div class="">
                      <a href="{{ route('export.uangsekolah', [
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
                              <table class="table table-bordered table-striped" id="example">
                                  <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Transaksi</th>
                                        <th>Tanggal</th>
                                        <th>Kategori</th>
                                        <th>Nama Transaksi</th>
                                        <th>Jumlah</th>
                                        <th>Nama Siswa</th>
                                        <th>Kelas</th>
                                        <th>Nama Orang Tua</th>
                                        <th>No. Telp Orang Tua</th>
                                        <th>Keterangan</th>
                                        <th>Diinput Oleh</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                      @foreach($data as $row)
                                      <tr>
                                          <td>{{ $loop->iteration}}</td>
                                          <td>{{ $row->kode_transaksi }}</td>
                                          <td>{{ $row->tanggal_bayar }}</td>
                                          <td>{{ $row->kategori->nama_kategori ?? '-' }}</td>
                                          <td>{{ $row->nama_pembayaran}}</td>
                                          <td>Rp {{ number_format($row->jumlah_bayar, 0, ',', '.') }}</td>
                                          <td>{{ $row->siswa->nama_siswa}}</td>
                                          <td>{{ $row->siswa->kelas}}</td>
                                          <td>{{ $row->siswa->orangtua->nama_ortu}}</td>
                                          <td>{{ $row->siswa->orangtua->nomor_telp}}</td>
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
