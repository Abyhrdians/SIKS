<div class="modal fade" id="EditKategori" tabindex="-1" aria-labelledby="EditKategori" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h1 class="modal-title fs-5" id="EditKategori">Form Edit Kategori</h1>
                <button type="button" class=" btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form id="editForm" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="id" id="edit_id">
                 <div class="modal-body px-4 py-3">
                    <div class="mb-3">
                        <label for="edit_kode_kategori" class="form-label">Kode Kategori</label>
                        <input type="text" class="form-control" id="edit_kode_kategori" name="kode_kategori" placeholder="Contoh: AA">
                    </div>

                    <div class="mb-3">
                        <label for="edit_nama" class="form-label">Nama Kategori</label>
                        <input type="text" class="form-control" id="edit_nama" name="nama" placeholder="Contoh: Donatur, Pembayaran Buku">
                    </div>

                    <div class="mb-3">
                        <label for="edit_tipe" class="form-label">Tipe</label>
                        <select name="tipe" id="edit_tipe" class="form-select" required>
                            <option value="" disabled selected>-- Pilih Tipe --</option>
                            <option value="uang_masuk">Uang Masuk</option>
                            <option value="uang_keluar">Uang Keluar</option>
                            <option value="uang_sekolah">Uang Sekolah</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="edit_keterangan" class="form-label">Keterangan (Opsional)</label>
                        <textarea name="keterangan" id="edit_keterangan" class="form-control" rows="3" placeholder="Contoh: Dana dari donatur tetap..."></textarea>
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
