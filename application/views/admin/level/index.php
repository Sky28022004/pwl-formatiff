<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="d-flex mb-4">
                <h5 class="card-title fw-semibold">Kelola Level Usaha</h5>
                <a href="<?= base_url('level/tambah') ?>" class="btn btn-sm btn-success ms-4">Tambah</a>
            </div>
            <div class="card">
                <div class="card-body p-4">
                    <table class="table table-bordered border-2 border-dark" id="dataTables" style="width: 100%;">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Level</th>
                                <th class="text-center">Omset</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($level as $l) : ?>
                                <tr>
                                    <td class="text-center"><?= $no++ ?></td>
                                    <td class="text-start"><?= $l->level ?></td>
                                    <td class="text-start"><?= $l->omset ?></td>
                                    <td class="text-center">
                                        <a href="<?= base_url('level/edit/' . $l->id) ?>" class="btn btn-sm btn-warning">Edit</a>
                                        <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#hapus" data-bs-id="<?= $l->id ?>" data-bs-level="<?= $l->level ?>">hapus</a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class=" modal fade" id="hapus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <strong class="confirm fs-4"></strong>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a href="" type="button" class="btn btn-danger">Hapus</a>
            </div>
        </div>
    </div>
</div>

<script>
    const exampleModal = document.getElementById('hapus')
    if (exampleModal) {
        exampleModal.addEventListener('show.bs.modal', event => {

            const button = event.relatedTarget

            const id = button.getAttribute('data-bs-id')
            const level = button.getAttribute('data-bs-level')

            const modalTitle = exampleModal.querySelector('.modal-title')
            const confirm = exampleModal.querySelector('.confirm')
            const link = exampleModal.querySelector('.modal-footer a')

            modalTitle.textContent = `Hapus data level ${level}`
            confirm.textContent = `Yakin ingin hapus data level ${level} ?`
            link.href = `<?= base_url('level/proses_hapus/') ?>${id}`
        })
    }
</script>