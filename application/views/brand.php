<section id="about">
    <div class="container py-5">
        <div class="row align-items-center py-5 mt-5">
            <h6 class="">BRAND</h6>
            <h2 class=" fw-bold display-4 mb-3">OUR BEST EFFORT</h2>
            <p class="">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore quae deserunt veritatis qui optio, corrupti recusandae adipisci ex dolorem odit itaque, at laudantium maiores reprehenderit dolore amet voluptates omnis earum perspiciatis, nemo rem eius ipsam! Fugiat excepturi aliquid, quibusdam quis maiores libero, debitis accusamus placeat, incidunt tenetur repudiandae sit molestiae.
            </p>
        </div>
    </div>
</section>

<section id="projects">

    <div class="container-fluid my-5 pt-5 p-0 ">
        <h6 class="text-center text-white mt-5">BRAND</h6>
        <h2 class="text-center text-white fw-bold display-4 mb-5">latest brand</h2>
        <div class="mb-4">
            <p class="text-center">
                <button class="filter-button px-3 me-2 mb-3 active" data-filter="*">All</button>
                <?php foreach ($bidang as $b) : ?>
                    <button class="filter-button px-3 me-2 mb-3" data-filter=".<?= $b->bidang ?>"><?= $b->bidang ?></button>
                <?php endforeach ?>
            </p>
        </div>

        <div class="isotope-container pb-3">
            <?php foreach ($brand as $br) : ?>
                <div class="col-md-2 item p-2 <?= $br->bidang ?>">
                    <div class="bg-danger">
                        <a href="#"><img src="<?= base_url('assets/img/logo/' . $br->logo) ?>" alt="image" class="img-fluid"></a>
                        <div class="description text-center px-3 py-5">
                            <h6 class="project-date my-3 pt-3"><?= $br->nama ?></h6>
                            <h1 class="project-heading mb-3 "><?= $br->nama_brand ?></h1>
                            <a href="<?= base_url('visitor/brand_detail/' . $br->id) ?>" class="btn btn-primary mt-3">View brand</a>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>

</section>