<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Kelola Brand</h5>
            <div class="card">
                <div class="card-body p-4">
                    <table class="table table-bordered border-2 border-dark" id="dataTables" style="width: 100%;">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Pemilik</th>
                                <th class="text-center">Brand</th>
                                <th class="text-center">Bidang</th>
                                <th class="text-center">Level</th>
                                <th class="text-center">Detail</th>
                                <th class="text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($brand as $b) : ?>
                                <tr>
                                    <td class="text-center"><?= $no++ ?></td>
                                    <td class="text-start"><?= $b->nama ?></td>
                                    <td class="text-start"><?= $b->nama_brand ?></td>
                                    <td class="text-start"><?= $b->bidang ?></td>
                                    <td class="text-center"><?= $b->level ?></td>
                                    <td class="text-center">
                                        <a href="<?= base_url('brand/detail/' . $b->id) ?>" class="btn btn-sm btn-warning">View</a>
                                    </td>
                                    <?php if ($b->id_status == null) : ?>
                                        <td class="text-center">
                                            <button data-bs-target="#hapus" data-bs-toggle="modal" data-bs-id="<?= $b->id_account ?>" data-bs-status="1" data-bs-brand="<?= $b->nama_brand ?>" class="btn btn-sm btn-primary">Setujui</button>
                                            <button data-bs-toggle="modal" data-bs-target="#hapus" data-bs-id="<?= $b->id_account ?>" data-bs-status="0" data-bs-brand="<?= $b->nama_brand ?>" class="btn btn-sm btn-danger">Tolak</button>
                                        </td>
                                    <?php else : ?>
                                        <td class="text-center">
                                            <?= $b->id_status == 1 ? "Disetujui" : "Ditolak" ?>
                                        </td>
                                    <?php endif ?>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="hapus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Hai</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <strong class="confirm fs-4">Hai</strong>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a href="" type="button" class="btn btn-warning"></a>
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
            const status = button.getAttribute('data-bs-status')
            const brand = button.getAttribute('data-bs-brand')

            if (status == 1) {
                var ket = "Setujui"
            } else if (status == 0) {
                var ket = "Tolak"
            }

            const modalTitle = exampleModal.querySelector('.modal-title')
            const confirm = exampleModal.querySelector('.confirm')
            const link = exampleModal.querySelector('.modal-footer a')

            modalTitle.textContent = `${ket} Brand`
            confirm.textContent = `Yakin akan ${ket} brand ${brand} ?`
            link.href = `<?= base_url('brand/konfirmasi/') ?>${id}/${status}`
            link.textContent = `${ket}`
        })
    }
</script>