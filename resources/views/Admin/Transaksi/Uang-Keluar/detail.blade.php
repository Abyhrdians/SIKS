<!-- Modal Detail Transaksi Keluar -->
<div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content border-0 rounded-4 shadow-lg">
      <div class="modal-header bg-primary text-white rounded-top-4">
        <h5 class="modal-title fw-semibold" id="detailModalLabel">
          <i class="bi bi-receipt me-2"></i> Detail Transaksi Keluar
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Tutup"></button>
      </div>
      <div class="modal-body px-4 py-3">
        <div class="row mb-3">
          <div class="col-md-6 mb-2">
            <label class="form-label fw-bold">Kode Transaksi</label>
            <div class="form-control-plaintext" id="detailKode">-</div>
          </div>
          <div class="col-md-6 mb-2">
            <label class="form-label fw-bold">Tanggal</label>
            <div class="form-control-plaintext" id="detailTanggal">-</div>
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-md-6 mb-2">
            <label class="form-label fw-bold">Kategori</label>
            <div class="form-control-plaintext" id="detailKategori">-</div>
          </div>
          <div class="col-md-6 mb-2">
            <label class="form-label fw-bold">Nama Transaksi</label>
            <div class="form-control-plaintext" id="detailNama">-</div>
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-md-6 mb-2">
            <label class="form-label fw-bold">Jumlah</label>
            <div class="form-control-plaintext text-success fw-semibold" id="detailJumlah">Rp 0</div>
          </div>
          <div class="col-md-6 mb-2">
            <label class="form-label fw-bold">Staff</label>
            <div class="form-control-plaintext" id="detailStaff">-</div>
          </div>
        </div>

        <div class="mb-3">
          <label class="form-label fw-bold">Keterangan</label>
          <div class="form-control-plaintext" id="detailKeterangan">-</div>
        </div>

        <div class="mb-2">
          <label class="form-label fw-bold">Foto Bukti</label>
          <div class="border rounded p-2 bg-light text-center">
            <img id="detailBukti" src="" alt="Bukti Transaksi" class="img-fluid rounded shadow-sm" style="max-height: 300px;">
          </div>
        </div>
      </div>
      <div class="modal-footer bg-light rounded-bottom-4">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
          <i class="bi bi-x-circle me-1"></i> Tutup
        </button>
      </div>
    </div>
  </div>
</div>
