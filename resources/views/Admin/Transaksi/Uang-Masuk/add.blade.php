<div class="modal fade" id="addTransaksi" tabindex="-1" aria-labelledby="addTransaksiLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content shadow">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="addTransaksiLabel">Form Tambah Transaksi</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{ route('admin.uangmasuk.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body px-4 py-3">
                    <div class="mb-3">
                        <label for="kategori" class="form-label">Kategori </label>
                        <select class="form-control" name="kategori" id="kategori">
                            <option value="" selected disabled>Pilih Kategori</option>
                            @foreach($kategori as $key => $kategoris)
                            <option value="{{$kategoris->id}}">{{$kategoris->nama_kategori}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Transaksi </label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama Transaksi">
                    </div>
                    <div class="mb-3">
                        <label for="jumlah" class="form-label">Jumlah</label>
                        <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Masukan Nilai Jumlah">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal Transaksi </label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal">
                    </div>
                    <div class="mb-3">
                        <label>Keterangan</label>
                        <textarea name="Keterangan" rows="3" class="form-control" required></textarea>
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
