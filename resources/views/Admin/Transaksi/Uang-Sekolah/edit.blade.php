<div class="modal fade" id="editTransaksi" tabindex="-1" aria-labelledby="editTransaksiLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content shadow">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="editTransaksiLabel">Form Edit Transaksi</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form id="editForm" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <input type="hidden" name="_method" value="PUT">
                <div class="modal-body px-4 py-3">
                    <div class="mb-3">
                        <label for="kategori" class="form-label">Kategori </label>
                        <select class="form-control" name="kategori" id="edit_kategori">
                            <option value="" selected disabled>Pilih Kategori</option>
                            @foreach($kategori as $key => $kategoris)
                            <option value="{{$kategoris->id}}">{{$kategoris->nama_kategori}}</option>
                            @endforeach
                        </select>
                    </div>
                     <div class="mb-3">
                        <label for="kelas" class="form-label">Kelas</label>
                        <select class="form-control"  id="edit_kelasSelect">
                            <option value="" selected disabled>Pilih Kelas</option>
                            @foreach($kelas as $key => $item)
                            <option value="{{$item->kelas}}">{{$item->kelas}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="siswa" class="form-label">Siswa</label>
                        <select class="form-control" name="siswa" id="edit_siswaSelect">
                            <option value="" selected disabled>Pilih Siswa</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nama_transaksi" class="form-label">Nama Transaksi </label>
                        <input type="text" class="form-control" id="edit_nama_transaksi" name="nama_transaksi" placeholder="Masukan Nama Transaksi">
                    </div>
                    <div class="mb-3">
                        <label for="jumlah_bayar" class="form-label">Jumlah</label>
                        <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="number" class="form-control" id="edit_jumlah_bayar" name="jumlah_bayar" placeholder="Masukan Nilai Jumlah">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_bayar" class="form-label">Tanggal Transaksi </label>
                        <input type="date" class="form-control" id="edit_tanggal_bayar" name="tanggal_bayar">
                    </div>
                    <div class="mb-3">
                        <label>Keterangan</label>
                        <textarea name="keterangan" rows="3" class="form-control" id="edit_keterangan" required></textarea>
                    </div>
                </div>
                <div class="modal-footer px-4 py-3">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
