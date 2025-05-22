<div class="modal fade" id="detailTransaksiModal" tabindex="-1" role="dialog" aria-labelledby="detailTransaksiModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content border-0">
            <!-- Header with school branding -->
            <div class="modal-header bg-primary text-white py-3">
                <div class="d-flex align-items-center w-100">
                    <div class="school-brand mr-3 d-flex align-items-center">
                        <i class="fas fa-school fa-lg mr-2"></i>
                        <h5 class="modal-title mb-0" id="detailTransaksiModalLabel">
                            <span class="d-block m-2">DETAIL TRANSAKSI SEKOLAH</span>
                        </h5>
                    </div>
                    <div class="ml-auto transaction-meta">
                        <span class="badge bg-white text-primary font-weight-bold py-2 px-3" id="detail_kodetransaksi"></span>
                    </div>
                </div>
                <button type="button" class="close text-white" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body px-4 py-4">
                <!-- Transaction Summary -->
                <div class="transaction-summary mb-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <h6 class="text-muted mb-1">Tanggal Transaksi</h6>
                            <h5 class="font-weight-bold text-dark mb-0" id="detail_tanggal_bayar"></h5>
                        </div>
                        <div class="text-right">
                            <h6 class="text-muted mb-1">Total Pembayaran</h6>
                            <h4 class="font-weight-bold text-success mb-0" id="detail_jumlah_bayar"></h4>
                        </div>
                    </div>
                </div>

                <div class="card mb-4 border-0 shadow-sm">
                    <div class="card-header bg-light-blue-gradient text-white d-flex align-items-center py-2">
                        <i class="fas fa-user-graduate mr-2"></i>
                        <h6 class="m-1 font-weight-bold">INFORMASI SISWA</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="info-item mb-3">
                                    <label class="text-muted small mb-1">Nama Lengkap Siswa</label>
                                    <p class="font-weight-bold mb-0 text-dark" id="detail_nama_siswa"></p>
                                </div>
                                <div class="info-item mb-3">
                                    <label class="text-muted small mb-1">Kelas</label>
                                    <p class="font-weight-bold mb-0 text-dark" id="detail_kelas"></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-item mb-3">
                                    <label class="text-muted small mb-1">Orang Tua/Wali</label>
                                    <p class="font-weight-bold mb-0 text-dark" id="detail_orang_tua_nama"></p>
                                </div>
                                <div class="info-item mb-3">
                                    <label class="text-muted small mb-1">Kontak Orang Tua</label>
                                    <p class="font-weight-bold mb-0 text-dark" id="detail_orang_tua_hp"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Payment Information Card -->
                <div class="card mb-4 border-0 shadow-sm">
                    <div class="card-header bg-green-gradient text-white d-flex align-items-center py-2">
                        <i class="fas fa-receipt mr-2"></i>
                        <h6 class="m-1 font-weight-bold">DETAIL PEMBAYARAN</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="info-item mb-3">
                                    <label class="text-muted small mb-1">Kategori Pembayaran</label>
                                    <p class="font-weight-bold mb-0 text-dark" id="detail_kategori_pembayaran"></p>
                                </div>

                            </div>
                            <div class="col-md-4">
                                 <div class="info-item mb-3">
                                    <label class="text-muted small mb-1">Nama Pembayaran</label>
                                    <p class="font-weight-bold mb-0 text-dark" id="detail_nama_pembayaran"></p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="info-item mb-3">
                                    <label class="text-muted small mb-1">Ditangani Oleh</label>
                                    <p class="font-weight-bold mb-0 text-dark" id="detail_petugas"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Additional Notes -->
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-purple-gradient text-white d-flex align-items-center py-2">
                        <i class="fas fa-notes-medical mr-2"></i>
                        <h6 class="m-1 font-weight-bold">CATATAN TAMBAHAN</h6>
                    </div>
                    <div class="card-body">
                        <div class="info-item">
                            <p class="mb-0" id="detail_keterangan"></p>
                            <p class="mb-0 text-muted font-italic small" id="no-keterangan" style="display: none;">- Tidak ada catatan -</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer border-top-0 bg-light">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    <i class="fas fa-times mr-2"></i> Tutup
                </button>
            </div>
        </div>
    </div>
</div>
