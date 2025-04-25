<section id="about">
    <div class="container py-5">
        <div class="row">
            <p class="mt-5 ms-4">Let's Grow Up Our Brand</p>
            <div class="row">
                <div class="col">
                    <h1 class="mb-5 ms-4">My Brand</h1>
                </div>
            </div>
            <?= $this->session->flashdata('pesan') ?>
            <div class="col-md-6 ps-md-5">
                <img src="<?= base_url('assets/img/logo/') . $brand->logo ?>" alt="image" class="img-fluid">
            </div>
            <div class="col-md-6 px-4 py-5">
                <div class="mb-2">
                    <h3>Pemilik</h3>
                    <p><?= $brand->nama ?></p>
                    <hr>
                </div>
                <div class="mb-2">
                    <h3>Nama Brand</h3>
                    <p><?= $brand->nama_brand ?></p>
                    <hr>
                </div>
                <div class="mb-2">
                    <h3>Bidang Usaha</h3>
                    <p><?= $brand->bidang ?></p>
                    <hr>
                </div>
                <div class="mb-2">
                    <h3>Level Usaha</h3>
                    <p><?= $brand->level ?></p>
                    <hr>
                </div>
                <div class="mb-2">
                    <h3>Status</h3>
                    <p><?= $brand->id_status == 1 ? "Disetujui" : "Ditolak" ?></p>
                    <hr>
                </div>
            </div>
            <div class="col-12 mb-4">
                <div class="row align-items-center">
                    <div class="col">
                        <hr>
                    </div>
                    <div class="col-auto">
                        <h4>Contact Brand</h4>
                    </div>
                    <div class="col">
                        <hr>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col text-center">
                        <a href="" class="btn btn-primary">Online Shop</a>
                    </div>
                    <div class="col text-center">
                        <a href="" class="btn btn-success">WhatsApp</a>
                    </div>
                    <div class="col text-center">
                        <a href="" class="btn btn-info">Social Media</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section id="projects">

        <div class="container-fluid my-5 pt-5 p-0 ">
            <div class="text-center">
                <h6 class="text-white mt-5">Our works</h6>
                <h2 class="text-white fw-bold display-4">Our Galery</h2>
                <button data-bs-toggle="modal" data-bs-target="#tambah" class="btn btn-success mb-5">Tambah Foto</button>
            </div>

            <div class="isotope-container">
                <?php foreach ($galery as $g) : ?>
                    <div class="col-md-2 p-2 item">
                        <img src="<?= base_url('assets/img/galery/' . $g->galery) ?>" alt="image" class="img-fluid">
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </section>
</section>

<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Foto Galery</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('brand/tambah_foto') ?>" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label">Foto</label>
                        <input class="form-control" type="file" accept=".jpg, .jpeg, .png" name="foto" required>
                        <div class="form-text">file jpg, jpeg, or png and max size 2MB</div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                        <div class="col text-end">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>