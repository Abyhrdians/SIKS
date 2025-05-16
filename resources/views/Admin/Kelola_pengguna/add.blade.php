<div class="modal fade" id="addPengguna" tabindex="-1" aria-labelledby="addPenggunaLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content shadow">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="addPenggunaLabel">Form Tambah Pengguna</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{ route('admin.kelola-pengguna.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body px-4 py-3">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama </label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama Pengguna">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email </label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Masukan Email Pengguna">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password </label>
                        <input type="text" class="form-control" id="password" name="password" placeholder="Masukan Password Pengguna">
                    </div>
                    <div class="mb-3">
                        <label for="role">Role </label>
                        <select class="form-control" name="role" id="role">
                            <option value="" disabled selected>Pilih Role</option>
                            <option value="1">Staff</option>
                            <option value="2">Kepala Sekolah</option>
                            <option value="0">Admin</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="foto">Foto </label>
                        <input type="file" class="form-control" id="foto" name="foto" aria-describedby="foto"
                                    placeholder="Masukkan Foto" required accept="image/png, image/jpeg, image/jpg"
                                    required>
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
