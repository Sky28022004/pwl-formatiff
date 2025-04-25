<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="d-flex mb-4">
                <h5 class="card-title fw-semibold">Detail Brand</h5>
                <a href="<?= base_url('brand') ?>" class="btn btn-sm btn-warning ms-4">Kembali</a>
            </div>
            <div class="card">
                <div class="card-body p-4">
                    <div class="row align-items-center mb-3">
                        <div class="col">
                            <hr>
                        </div>
                        <div class="col-auto display-6 fw-bold">Brand</div>
                        <div class="col">
                            <hr>
                        </div>
                    </div>

                    <div class="text-center mb-3">
                        <img src="<?= base_url('assets/img/logo/') . $brand->logo ?>" style="width:25%">
                    </div>

                    <div class="row fs-5">
                        <p class="col-sm-2 col-form-label">Pemilik</p>
                        <div class="col-sm-10">
                            <p class="form-control-plaintext"><?= $brand->nama ?></p>
                            </p>
                        </div>
                    </div>
                    <div class="row fs-5">
                        <p class="col-sm-2 col-form-label">Brand</p>
                        <div class="col-sm-10">
                            <p class="form-control-plaintext"><?= $brand->nama_brand ?></p>
                            </p>
                        </div>
                    </div>
                    <div class="row fs-5">
                        <p class="col-sm-2 col-form-label">Bidang</p>
                        <div class="col-sm-10">
                            <p class="form-control-plaintext"><?= $brand->bidang ?></p>
                            </p>
                        </div>
                    </div>
                    <div class="row fs-5">
                        <p class="col-sm-2 col-form-label">Level</p>
                        <div class="col-sm-10">
                            <p class="form-control-plaintext"><?= $brand->level ?></p>
                            </p>
                        </div>
                    </div>
                    <div class="row fs-5">
                        <p class="col-sm-2 col-form-label">Deskripsi</p>
                        <div class="col-sm-10">
                            <p class="form-control-plaintext"><?= $brand->deskripsi ?></p>
                            </p>
                        </div>
                    </div>
                    <div class="row fs-5">
                        <p class="col-sm-2 col-form-label">Status</p>
                        <div class="col-sm-10">
                            <p class="form-control-plaintext">
                                <?= $brand->id_status == null ? "Menunggu Konfirmasi" : "" ?>
                                <?= $brand->id_status == 1 && $brand->id_status != null ? "Disetujui" : "Ditolak" ?></p>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body p-4">
                    <div class="row align-items-center mb-3">
                        <div class="col">
                            <hr>
                        </div>
                        <div class="col-auto display-6 fw-bold">Kontak</div>
                        <div class="col">
                            <hr>
                        </div>
                    </div>
                    <div class="row fs-5 mb-3">
                        <p class="col-sm-2 col-form-label">Online Shop</p>
                        <div class="col-sm-10">
                            <a href="<?= $brand->onlineshop ?>" class=" btn btn-primary" target="_blank">Go to Online Shop</a>
                        </div>
                        <a href="<?= $brand->onlineshop ?>" class="col dispaly-7 mt-3" target="_blank"><?= $brand->onlineshop ?></a>
                        <hr>
                    </div>
                    <div class="row fs-5 mb-3">
                        <p class="col-sm-2 col-form-label">WhatsApp</p>
                        <div class="col-sm-10">
                            <a href="<?= $brand->whatsapp ?>" class=" btn btn-success" target="_blank">Go to WhatsApp</a>
                        </div>
                        <a href="<?= $brand->whatsapp ?>" class="col dispaly-7 mt-3" target="_blank"><?= $brand->whatsapp ?></a>
                        <hr>
                    </div>
                    <div class="row fs-5 mb-3">
                        <p class="col-sm-2 col-form-label">Social Media</p>
                        <div class="col-sm-10">
                            <a href="<?= $brand->socialmedia ?>" class=" btn btn-secondary" target="_blank">Go to Social Media</a>
                        </div>
                        <a href="<?= $brand->socialmedia ?>" class="col dispaly-7 mt-3" target="_blank"><?= $brand->socialmedia ?></a>
                        <hr>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body p-4">
                    <div class="row align-items-center mb-3">
                        <div class="col">
                            <hr>
                        </div>
                        <div class="col-auto display-6 fw-bold">Galery</div>
                        <div class="col">
                            <hr>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <?php foreach ($galery as $g) : ?>
                            <div class="col-3"><img src="<?= base_url('assets/img/galery/') . $g->galery ?>" alt=""></div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </div>