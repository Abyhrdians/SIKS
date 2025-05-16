<div class="modal fade" id="editPengguna" tabindex="-1" aria-labelledby="editPenggunaLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content shadow">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="editPenggunaLabel">Form Edit Pengguna</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form id="editForm" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <input type="hidden" name="_method" value="PUT">
                <div class="modal-body px-4 py-3">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama </label>
                        <input type="text" class="form-control" id="edit_nama" name="nama" placeholder="Masukan Nama Pengguna">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email </label>
                        <input type="text" class="form-control" id="edit_email" name="email" placeholder="Masukan Email Pengguna">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input
                            type="text"
                            class="form-control"
                            id="edit_password"
                            name="password"
                            placeholder="Masukkan password pengguna (opsional)">
                        <div class="form-text text-muted">
                            Kosongkan jika tidak ingin mengubah password.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="role">Role </label>
                        <select class="form-control" name="role" id="edit_role">
                            <option value="" disabled selected>Pilih Role</option>
                            <option value="1">Staff</option>
                            <option value="2">Kepala Sekolah</option>
                            <option value="0">Admin</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="foto">Foto </label>
                        <input type="file" class="form-control" id="foto" name="foto" aria-describedby="foto"
                        placeholder="Masukkan Foto" accept="image/png, image/jpeg, image/jpg">
                    </div>
                    <div class="form-text text-muted">
                            Kosongkan jika tidak ingin mengubah foto.
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
