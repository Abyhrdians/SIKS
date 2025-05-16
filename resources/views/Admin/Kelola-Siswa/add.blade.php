<div class="modal fade" id="addSiswa" tabindex="-1" aria-labelledby="addSiswaLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content shadow">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="addSiswaLabel">Form Tambah Siswa</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{ route('admin.kelola-siswa.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body px-4 py-3">
                    <div id="step-siswa">
                        <h5>Data Siswa</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="nisn">NISN</label>
                                    <input type="text" class="form-control" name="nisn" required>
                                </div>
                                <div class="mb-3">
                                    <label for="nama_siswa">Nama Siswa</label>
                                    <input type="text" class="form-control" name="nama_siswa" required>
                                </div>
                                <div class="mb-3">
                                    <label>Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-control" required>
                                        <option value="L">Laki-laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>


                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Nomor Telepon</label>
                                    <input type="text" class="form-control" name="nomor_telp" required>
                                </div>
                                <div class="mb-3">
                                    <label>Kelas</label>
                                    <input type="text" class="form-control" name="kelas" required>
                                </div>
                                <div class="mb-3">
                                    <label>Tanggal Lahir</label>
                                    <input type="date" class="form-control" name="tanggal_lahir" required>
                                </div>
                                {{-- <div class="mb-3">
                                    <label>Status</label>
                                    <select name="status" class="form-control" required>
                                        <option value="Aktif">Aktif</option>
                                        <option value="Tidak Aktif">Tidak Aktif</option>
                                    </select>
                                </div> --}}
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label>Alamat</label>
                                    <textarea name="alamat" rows="3" class="form-control" required></textarea>
                                </div>
                            </div>
                            <div class="modal-footer px-4 py-3">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                <button type="button" class="btn btn-primary" onclick="nextStep()">Selanjutnya</button>
                            </div>
                        </div>
                    </div>

                    <div id="step-ortu" style="display: none;">
                        <h5>Data Orang Tua</h5>
                        <div class="mb-3">
                            <label for="nik">NIK</label>
                            <div class="d-flex">
                                <input type="text" class="form-control me-2" id="nik" name="nik" placeholder="NIK" required>
                                <button type="button" class="btn btn-secondary" id="cekNik">Cek</button>
                            </div>
                            <small id="nik-status" class="text-muted mt-1 d-block"></small>
                        </div>
                        <div class="mb-3">
                            <label>Nama Orang Tua</label>
                            <input type="text" class="form-control" id="nama_ortu" name="nama_ortu" disabled required>
                        </div>
                        <div class="mb-3">
                            <label>Nomor Telepon</label>
                            <input type="text" class="form-control" id="nomor_telp_ortu" name="nomor_telp_ortu"disabled required>
                        </div>

                        <div class="mb-3">
                            <label>Pekerjaan</label>
                            <input type="text" class="form-control" id="pekerjaan" name="pekerjaan"disabled required>
                        </div>
                         <div class="mb-3">
                            <label>Alamat</label>
                            <textarea class="form-control" id="alamat_ortu" rows="3" name="alamat_ortu" disabled required></textarea>
                        </div>
                        <div class="modal-footer px-4 py-3">
                            <button type="button" class="btn btn-secondary" onclick="prevStep()">Kembali</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>


            </form>
        </div>
    </div>
</div>
