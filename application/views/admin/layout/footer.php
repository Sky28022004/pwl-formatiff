<div class="py-6 px-6 text-center">
    <p class="mb-0 fs-4">Copyright&copy; <?= date('Y') ?></p>
</div>
</div>
</div>
</div>
<script src="<?= base_url('') ?>assets/admin/src/assets/libs/jquery/dist/jquery.min.js"></script>
<script src="<?= base_url('') ?>assets/admin/src/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('') ?>assets/admin/src/assets/js/sidebarmenu.js"></script>
<script src="<?= base_url('') ?>assets/admin/src/assets/js/app.min.js"></script>
<script src="<?= base_url('') ?>assets/admin/src/assets/libs/apexcharts/dist/apexcharts.min.js"></script>
<script src="<?= base_url('') ?>assets/admin/src/assets/libs/simplebar/dist/simplebar.js"></script>
<script src="<?= base_url('') ?>assets/admin/src/assets/js/dashboard.js"></script>
<script src="https://cdn.datatables.net/2.0.6/js/dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        new DataTable('#dataTables');
    });
</script>
</body>

</html>