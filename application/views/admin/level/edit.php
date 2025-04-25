<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="d-flex mb-4">
                <h5 class="card-title fw-semibold">Form Tambah Level Usaha</h5>
                <a href="<?= base_url('level') ?>" class="btn btn-sm btn-warning ms-4">Kembali</a>
            </div>
            <div class="card">
                <div class="card-body p-4">
                    <form action="<?= base_url('level/proses_edit/' . $level->id) ?>" method="post">
                        <div class="mb-3">
                            <label class="form-label">Level</label>
                            <input type="text" class="form-control" name="level" value="<?= $level->level ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Omset</label>
                            <input type="text" class="form-control" name="omset" value="<?= $level->omset ?>" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>