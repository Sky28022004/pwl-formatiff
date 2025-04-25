<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="d-flex mb-4">
                <h5 class="card-title fw-semibold">Form Tambah Bidang Usaha</h5>
                <a href="<?= base_url('bidang') ?>" class="btn btn-sm btn-warning ms-4">Kembali</a>
            </div>
            <div class="card">
                <div class="card-body p-4">
                    <form action="<?= base_url('bidang/proses_tambah') ?>" method="post">
                        <div class="mb-3">
                            <label class="form-label">Nama Bidang</label>
                            <input type="text" class="form-control" name="bidang" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>