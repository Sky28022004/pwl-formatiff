<section id="about">
    <div class="container py-5">
        <div class="row">
            <p class="mt-5 ms-4">Let's Grow Up</p>
            <div class="row">
                <div class="col">
                    <h1 class="mb-5 ms-4">Detail Brand</h1>
                </div>
            </div>
            <div class="col-md-6 ps-md-5">
                <img src="<?= base_url('assets/img/logo/') . $brand->logo ?>" alt="image" class="img-fluid">
            </div>
            <div class="col-md-6 px-4 py-5">
                <div class="mb-2">
                    <h5>Pemilik</h5>
                    <p><?= $brand->nama ?></p>
                    <hr>
                </div>
                <div class="mb-2">
                    <h5>Nama Brand</h5>
                    <p><?= $brand->nama_brand ?></p>
                    <hr>
                </div>
                <div class="mb-2">
                    <h5>Bidang Usaha</h5>
                    <p><?= $brand->bidang ?></p>
                    <hr>
                </div>
                <div class="mb-2">
                    <h5>Level Usaha</h5>
                    <p><?= $brand->level ?></p>
                    <hr>
                </div>
                <div class="mb-2">
                    <h5>Status</h5>
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
                        <h5>Contact Brand</h5>
                    </div>
                    <div class="col">
                        <hr>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col text-center">
                        <a href="<?= $brand->onlineshop ?>" target="_blank" class="btn btn-primary">Online Shop</a>
                    </div>
                    <div class="col text-center">
                        <a href="<?= $brand->whatsapp ?>" target="_blank" class="btn btn-success">WhatsApp</a>
                    </div>
                    <div class="col text-center">
                        <a href="<?= $brand->socialmedia ?>" target="_blank" class="btn btn-info">Social Media</a>
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