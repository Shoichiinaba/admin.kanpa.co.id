<link rel="stylesheet" href="<?= base_url('assets'); ?>/css/detail-prop.css" />

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-0"><span class="text-muted fw-light">Detail</span> Properti</h4>
    <div id="lazy-loader"></div>
    <div id="carousel-content" style="display:none;">
        <div class="row mb-0">
            <div class="col-lg-7 col-md-7 col-sm-12">
                <div id="carouselExample-cf" class="carousel carousel-dark slide carousel-fade" data-bs-ride="carousel">
                    <?php if (!empty($detail)) : ?>
                    <ol class="carousel-indicators">
                        <?php foreach ($detail[0]->gambar as $index => $gambar) : ?>
                        <li data-bs-target="#carouselExample-cf" data-bs-slide-to="<?= $index; ?>"
                            class="<?= $index == 0 ? 'active' : ''; ?>"></li>
                        <?php endforeach; ?>
                    </ol>
                    <div class="carousel-inner">
                        <?php foreach ($detail[0]->gambar as $index => $gambar) : ?>
                        <div class="carousel-item <?= $index == 0 ? 'active' : ''; ?>">
                            <?php if (!empty($gambar)) : ?>
                            <img class="d-block w-100" src="<?= base_url('upload/gambar_properti/'.$gambar); ?>"
                                alt="Slide <?= $index + 1; ?>" />
                            <?php else: ?>
                            <p>Gambar tidak tersedia.</p>
                            <?php endif; ?>
                            <div class="carousel-caption d-none d-md-block judul">
                                <h5
                                    style="color: white; background-color: rgba(0, 0, 0, 0.2); padding: 2px; border-radius: 5px; width: 90%;">
                                    <?= $detail[0]->judul_properti; ?>
                                </h5>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExample-cf" role="button" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExample-cf" role="button" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-md-5 col-lg-5 col-xl-5 col-sm-12 order-0">
                <div class="card h-95">
                    <div class="card-header d-flex align-items-center justify-content-between pb-1 pt-1">
                        <div class="card-title mb-0">
                            <h5 class="m-0 me-2 mt-1"><?= $detail[0]->judul_properti; ?></h5>
                            <small class="text-muted"><?= $detail[0]->alamat; ?></small>
                        </div>
                        <div class="dropdown">
                            <div class="demo-inline-spacing">
                                <H3 class="badge bg-label-primary harga shadow">Rp. <?= $detail[0]->harga; ?>
                                    <?= $detail[0]->satuan; ?></H3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pb-0">
                        <div class="demo-inline-spacing mb-3">
                            <h3 class="badge bg-label-info harga rounded-2 shadow">Type. <?= $detail[0]->luas_tanah; ?>/
                                <?= $detail[0]->luas_bangunan; ?></h3>
                            <h3 class="badge bg-label-info harga rounded-2 shadow">LT. <?= $detail[0]->luas_tanah; ?>
                            </h3>
                            <h3 class="badge bg-label-info harga rounded-2 shadow">LB. <?= $detail[0]->luas_bangunan; ?>
                            </h3>
                            <h3 class="badge bg-label-info harga rounded-2 shadow">LV. <?= $detail[0]->level; ?></h3>
                        </div>
                        <ul class="p-0 m-0">
                            <li class="d-flex mb-0 pb-0">
                                <div class="avatar flex-shrink-0 me-3">
                                    <span class="avatar-initial rounded bg-label-primary"><i
                                            class="bx bx-message-alt-detail"></i>
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <h6 class="mb-0">Detail</h6>
                                    </div>
                            </li>
                            <div class="demo-inline-spacing">
                                <ul class="list-unstyled d-flex flex-wrap">
                                    <li class="d-flex mb-4 pb-1 align-items-center justify-content-center">
                                        <div class="text-center">
                                            <div class="i-kamar-tidur i-size mx-auto mb-2"></div>
                                            <p class="font-weight-bold f-sz-li-detail m-0">
                                                <?= $detail[0]->jml_kamar; ?><br>Kamar<br> Tidur
                                            </p>
                                        </div>
                                    </li>
                                    <li class="d-flex mb-4 pb-1 align-items-center justify-content-center">
                                        <div class="text-center">
                                            <div class="i-kamar-mandi i-size mx-auto mb-2"></div>
                                            <p class="font-weight-bold f-sz-li-detail m-0">
                                                <?= $detail[0]->jml_kamar_mandi; ?><br>Kamar<br> Mandi
                                            </p>
                                        </div>
                                    </li>
                                    <li class="d-flex mb-5 pb-0 align-items-center justify-content-center">
                                        <div class="text-center">
                                            <div class="i-carport i-size mx-auto mt-2 mb-1"></div>
                                            <p class="font-weight-bold f-sz-li-detail m-0">
                                                <?= $detail[0]->carport; ?><br>Carport
                                            </p>
                                        </div>
                                    </li>
                                    <li class="d-flex mb-4 pb-1 align-items-center justify-content-center">
                                        <div class="text-center">
                                            <div class="i-tamu i-size mx-auto mb-2"></div>
                                            <p class="font-weight-bold f-sz-li-detail m-0">
                                                <?= $detail[0]->ruang_tamu; ?><br>Ruang<br> Tamu
                                            </p>
                                        </div>
                                    </li>
                                    <?php if ($detail[0]->ruang_keluarga == 1): ?>
                                    <li class="d-flex mb-4 pb-1 align-items-center justify-content-center">
                                        <div class="text-center">
                                            <div class="i-keluarga i-size mx-auto mb-2"></div>
                                            <p class="font-weight-bold f-sz-li-detail m-0">
                                                <?= $detail[0]->ruang_keluarga; ?><br>Ruang<br> Keluarga
                                            </p>
                                        </div>
                                    </li>
                                    <?php endif; ?>
                                    <li class="d-flex mb-5 pb-0 align-items-center justify-content-center">
                                        <div class="text-center">
                                            <div class="i-taman i-size mx-auto mt-2 mb-1"></div>
                                            <p class="font-weight-bold f-sz-li-detail m-0">
                                                <?= $detail[0]->taman; ?><br>Taman
                                            </p>
                                        </div>
                                    </li>
                                    <li class="d-flex mb-4 pb-1 align-items-center justify-content-center">
                                        <div class="text-center">
                                            <div class="i-makan i-size mx-auto mb-2"></div>
                                            <p class="font-weight-bold f-sz-li-detail m-0">
                                                <?= $detail[0]->ruang_makan; ?><br>Ruang<br>Makan
                                            </p>
                                        </div>
                                    </li>
                                    <?php if ($detail[0]->balkon == 1): ?>
                                    <li class="d-flex mb-5 pb-0 align-items-center justify-content-center">
                                        <div class="text-center">
                                            <div class="i-balkon i-size mx-auto mt-2 mb-1"></div>
                                            <p class="font-weight-bold f-sz-li-detail m-0">
                                                <?= $detail[0]->balkon; ?><br>Balkon
                                            </p>
                                        </div>
                                    </li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                            <li class="d-flex mb-0">
                                <div class="avatar flex-shrink-0 me-3">
                                    <span class="avatar-initial rounded bg-label-info"><i
                                            class="bx bx-building-house"></i></span>
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <h6 class="mb-0">Fasilitas</h6>
                                    </div>
                            </li>
                            <div class="demo-inline-spacing fasiliti">
                                <ul class="list-unstyled d-flex flex-wrap">
                                    <?php if ($detail[0]->taman_bermain == 1): ?>
                                    <li class="d-flex mb-4 pb-1 align-items-center justify-content-center">
                                        <div class="text-center">
                                            <div class="i-tamab-ber i-size mx-auto mb-2"></div>
                                            <p class="font-weight-bold f-sz-li-detail m-0">
                                                Taman<br>Bermain
                                            </p>
                                        </div>
                                    </li>
                                    <?php endif; ?>

                                    <?php if ($detail[0]->jalan > 0): ?>
                                    <li class="d-flex mb-4 pb-0 align-items-center justify-content-center">
                                        <div class="text-center">
                                            <div class="i-jalan i-size mx-auto mb-2"></div>
                                            <p class="font-weight-bold f-sz-li-detail m-0">
                                                <?= $detail[0]->jalan; ?> M<br>Jalan
                                            </p>
                                        </div>
                                    </li>
                                    <?php endif; ?>

                                    <?php if ($detail[0]->one_gate == 1): ?>
                                    <li class="d-flex mb-4 pb-1 align-items-center justify-content-center">
                                        <div class="text-center">
                                            <div class="i-gate i-size mx-auto mb-2"></div>
                                            <p class="font-weight-bold f-sz-li-detail m-0">
                                                One Gate<br>System
                                            </p>
                                        </div>
                                    </li>
                                    <?php endif; ?>

                                    <?php if ($detail[0]->security == 1): ?>
                                    <li class="d-flex mb-5 pb-0 align-items-center justify-content-center">
                                        <div class="text-center">
                                            <div class="i-security i-size mx-auto mt-2 mb-1"></div>
                                            <p class="font-weight-bold f-sz-li-detail m-0">
                                                Security
                                            </p>
                                        </div>
                                    </li>
                                    <?php endif; ?>

                                    <?php if ($detail[0]->cctv == 1): ?>
                                    <li class="d-flex mb-4 pb-1 align-items-center justify-content-center">
                                        <div class="text-center">
                                            <div class="i-cctv i-size mx-auto mb-2"></div>
                                            <p class="font-weight-bold f-sz-li-detail m-0">
                                                CCTV 24<br>Jam
                                            </p>
                                        </div>
                                    </li>
                                    <?php endif; ?>

                                    <?php if ($detail[0]->kolam_renang == 1): ?>
                                    <li class="d-flex mb-4 pb-1 align-items-center justify-content-center">
                                        <div class="text-center">
                                            <div class="i-kolam i-size mx-auto mb-2"></div>
                                            <p class="font-weight-bold f-sz-li-detail m-0">
                                                Kolam<br>Renang
                                            </p>
                                        </div>
                                    </li>
                                    <?php endif; ?>

                                    <?php if ($detail[0]->area_ruko == 1): ?>
                                    <li class="d-flex mb-4 pb-1 align-items-center justify-content-center">
                                        <div class="text-center">
                                            <div class="i-ruko i-size mx-auto"></div>
                                            <p class="font-weight-bold f-sz-li-detail m-0">
                                                Area<br>Ruko
                                            </p>
                                        </div>
                                    </li>
                                    <?php endif; ?>

                                    <?php if ($detail[0]->masjid == 1): ?>
                                    <li class="d-flex mb-5 pb-0 align-items-center justify-content-center">
                                        <div class="text-center">
                                            <div class="i-masjid i-size mx-auto mt-2 mb-1"></div>
                                            <p class="font-weight-bold f-sz-li-detail m-0">
                                                Masjid
                                            </p>
                                        </div>
                                    </li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-7 col-lg-7 col-xl-7 col-sm-12 order-0">
                <div class="accordion mt-3" id="accordionExample">
                    <div class="card accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse"
                                data-bs-target="#accordionThree" aria-expanded="false" aria-controls="accordionThree">
                                Deskripsi
                            </button>
                        </h2>
                        <div id="accordionThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <?= $detail[0]->deskripsi; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-lg-4 col-xl-4 col-sm-12">
                <div class="accordion mt-3" id="accordionExample">
                    <div class="card accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse"
                                data-bs-target="#accordionTwo" aria-expanded="false" aria-controls="accordionTwo">
                                Promo
                            </button>
                        </h2>
                        <div id="accordionTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <?php if (empty($promo)) : ?>
                                <!-- Jika tidak ada promo, tampilkan alert dan tombol Buat Promo -->
                                <div class="alert alert-primary text-center mb-0" role="alert">Belum Ada Promo!</div>
                                <div class="demo-inline-spacing">
                                    <button type="button" class="btn btn-sm btn-outline-primary rounded-3"
                                        data-bs-toggle="modal" data-bs-target="#buat-promo">Buat Promo</button>
                                </div>
                                <?php else : ?>
                                <!-- Jika ada promo, tampilkan nama promo dan tombol Edit Promo -->
                                <?php foreach ($promo as $p) : ?>
                                <p class="card-text"><?= $p->nama_promo; ?></p>
                                <?php endforeach; ?>
                                <div class="demo-inline-spacing">
                                    <button type="button"
                                        class="btn btn-sm btn-outline-success rounded-2 btn-edit-promo"
                                        data-id="<?= $p->id_promo; ?>">Edit Promo</button>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-lg-1 col-xl-1 col-sm-12 p-0 m-0">
                <div class="demo-inline-spacing p-0 m-0">
                    <button type="button" class="btn btn-sm btn-success p-0 rounded-1">Ubah
                        Content</button>
                </div>
            </div>
        </div>
    </div>


</div>