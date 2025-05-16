<div class="modal fade" id="DetailSiswa" tabindex="-1" aria-labelledby="DetailSiswaLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content shadow">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="DetailSiswaLabel">Detail</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body px-4 py-3">
                <h6 class="text-primary mb-3">Data Siswa</h6>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">NISN</label>
                        <input type="text" class="form-control" id="detail_nisn" readonly>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Nama Siswa</label>
                        <input type="text" class="form-control" id="detail_nama_siswa" readonly>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label class="form-label">Jenis Kelamin</label>
                        <input type="text" class="form-control" id="detail_jk" readonly>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Kelas</label>
                        <input type="text" class="form-control" id="detail_kelas" readonly>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Tanggal Lahir</label>
                        <input type="text" class="form-control" id="detail_tgl" readonly>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Alamat Siswa</label>
                    <textarea class="form-control" id="detail_alamat_siswa" rows="2" readonly></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nomor Telepon Siswa</label>
                    <input type="text" class="form-control" id="detail_nomor_telp_siswa" readonly>
                </div>

                <hr class="my-4">

                <h6 class="text-primary mb-3">Data Orang Tua</h6>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">NIK Orang Tua</label>
                        <input type="text" class="form-control" id="detail_nik" readonly>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Nama Orang Tua</label>
                        <input type="text" class="form-control" id="detail_nama_ortu" readonly>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Nomor Telepon Orang Tua</label>
                        <input type="text" class="form-control" id="detail_nomor_telp_ortu" readonly>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Pekerjaan Orang Tua</label>
                        <input type="text" class="form-control" id="detail_pekerjaan" readonly>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Alamat Orang Tua</label>
                    <textarea class="form-control" id="detail_alamat_ortu" rows="2" readonly></textarea>
                </div>
            </div>
        </div>
    </div>
</div>
