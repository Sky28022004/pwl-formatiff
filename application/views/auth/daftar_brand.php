<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pendaftaran Brand | Katalog</title>
    <link rel="shortcut icon" type="image/png" href="<?= base_url('') ?>/assets/admin/src/assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="<?= base_url('') ?>/assets/admin/src/assets/css/styles.min.css" />
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
        <div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-3">
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="<?= base_url('') ?>" class="text-nowrap logo-img text-center d-block py-3 w-100">
                                    <!-- <img src="<?= base_url('') ?>/assets/admin/src/assets/images/logos/dark-logo.svg" width="180" alt=""> -->
                                    <h1>KATALOG</h1>
                                </a>
                                <p class="text-center">Pendaftaran Brand</p>
                                <form action="<?= base_url('auth/proses_daftar') ?>" method="post" enctype="multipart/form-data">
                                    <div>
                                        <input type="hidden" name="nama" value="<?= $nama ?>" readonly>
                                        <input type="hidden" name="email" value="<?= $email ?>" readonly>
                                        <input type="hidden" name="password" value="<?= $password ?>" readonly>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <hr>
                                        </div>
                                        <div class="col-auto">
                                            <h3 class="mb-3">BRAND</h3>
                                        </div>
                                        <div class="col">
                                            <hr>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Nama Brand</label>
                                        <input type="text" class="form-control" name="brand" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Logo</label>
                                        <input class="form-control" type="file" accept=".jpg, .jpeg, .png" name="logo" required>
                                        <div id="emailHelp" class="form-text">file jpg, jpeg, or png and max size 2MB</div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Deskripsi</label>
                                        <textarea class="form-control" type="text" name="deskripsi" required></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Bidang</label>
                                        <select class="form-select" name="bidang" required>
                                            <option value="">-- Pilih Bidang --</option>
                                            <?php foreach ($bidang as $b) : ?>
                                                <option value="<?= $b->id ?>"><?= $b->bidang ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Level</label>
                                        <select class="form-select" name="level" required>
                                            <option value="">-- Pilih Level --</option>
                                            <?php foreach ($level as $l) : ?>
                                                <option value="<?= $l->id ?>"><?= $l->level ?> | Omset <?= $l->omset ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <hr>
                                        </div>
                                        <div class="col-auto">
                                            <h3 class="mb-3">CONTACT BRAND</h3>
                                        </div>
                                        <div class="col">
                                            <hr>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Link Online Shop</label>
                                        <input type="text" class="form-control" name="os" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Link WhatsApp Me</label>
                                        <input type="text" class="form-control" name="wa" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Link Social Media</label>
                                        <input type="text" class="form-control" name="sm" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Daftar</button>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <p class="fs-4 mb-0 fw-bold">Already have an Account?</p>
                                        <a class="text-primary fw-bold ms-2" href="<?= base_url('auth/login') ?>">Sign In</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?= base_url('') ?>/assets/admin/src/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="<?= base_url('') ?>/assets/admin/src/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>