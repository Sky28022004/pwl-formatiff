    <section id="about">
        <div class="container py-5">
            <div class="row justify-content-center py-5">
                <h1 class="text-center mt-5">Contact</h1>
                <p class="text-center mb-5">Silahkan hubungi kami</p>
                <div class="col-sm-5">
                    <?= $this->session->flashdata('pesan') ?>
                    <form action="<?= base_url('visitor/kirim_pesan') ?>" method="post">
                        <div class="mb-3">
                            <label class="form-label">Email address</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name="nama" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Phone number</label>
                            <input type="text" class="form-control" name="no_hp" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Message</label>
                            <textarea type="text" class="form-control" name="pesan" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>