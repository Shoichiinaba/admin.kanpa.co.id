<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <?php if (isset($error_message) && !empty($error_message)) : ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <?= htmlspecialchars($error_message); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php endif; ?>
            <div class="nav-align-top mb-4">
                <ul class="nav nav-tabs nav-fill" role="tablist">
                    <?php foreach ($map_prov as $index => $data) : ?>
                    <li class="nav-item position-relative">
                        <button type="button" class="nav-link <?php echo $index === 0 ? 'active' : ''; ?>" role="tab"
                            data-bs-toggle="tab" data-id="<?= htmlspecialchars($data['id']); ?>"
                            data-id_prov="<?= htmlspecialchars($data['id_prov']); ?>"
                            data-bs-target="#map-<?= htmlspecialchars($data['id']); ?>"
                            aria-controls="map-<?= htmlspecialchars($data['id']); ?>"
                            aria-selected="<?php echo $index === 0 ? 'true' : 'false'; ?>">
                            <i class="tf-icons bx bx-map-pin"></i> <?= htmlspecialchars($data['nama_provinsi']); ?>
                        </button>
                    </li>
                    <?php endforeach; ?>
                </ul>
                <div class="tab-content">
                    <?php foreach ($map_prov as $index => $data) : ?>
                    <div class="tab-pane fade <?php echo $index === 0 ? 'show active' : ''; ?>"
                        id="map-<?= htmlspecialchars($data['id']); ?>" role="tabpanel">
                        <!-- SVG map akan dimuat di sini -->
                        <div class="error-message-container"></div>
                    </div>
                    <?php endforeach; ?>
                </div>

            </div>
        </div>
    </div>
</div>