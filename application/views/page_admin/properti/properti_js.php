<div class="modal fade" id="add-properti" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel3">Tambah Properti</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pt-2">
                <div class="row">
                    <?php foreach ($type as $index => $data) : ?>
                    <div class="tombol">
                        <button type="button" class="btn btn-outline-primary btn-sm rounded-3 shadow type-button"
                            data-id="<?= $data->id_type; ?>" data-type="<?= $data->nama_type; ?>" style=" width: 80px; height: 80px; display: flex; flex-direction: column; align-items:
                            center; justify-content: center;">
                            <img src="<?= base_url('upload/icon/' . $data->icon); ?>" alt="<?= $data->nama_type; ?>"
                                class="icon-img" style="width: 48px; height: 48px;">
                            <p class="mt-2 mb-0"><?= $data->nama_type; ?></p>
                        </button>
                    </div>
                    <?php endforeach; ?>
                </div>

                <div class="container mt-5" id="form-container" style="display: none;">
                    <div class="alert alert-success mt-1" role="alert">Judul Properti
                    </div>
                    <form id="jualPropertiForm" enctype="multipart/form-data">
                        <!-- Data Properti -->
                        <div class="form-group" hidden>
                            <label for="id_type">Tipe Properti</label>
                            <input type="text" name="id_type" class="form-control">
                            <input type="text" name="id_nama" class="form-control">
                        </div>
                        <div class="row ">
                            <div class="input-wrapper col-6" id="penawaran">
                                <input class="form-control" list="data-penawaran" name="penawaran"
                                    placeholder="Pilih jenis Penawaran..." />
                                <label for="penawaran" class="label-in">Pilih Penawaran</label>

                                <datalist id="data-penawaran">
                                    <option value="Dijual"></option>
                                    <option value="Disewakan"></option>
                                </datalist>
                            </div>
                            <div class="input-wrapper col-6" id="kota-list">
                                <input class="form-control" list="datalistOptions" id="exampleDataList"
                                    placeholder="Ketik nama kota...">
                                <label for="exampleDataList" class="label-in">Pilih Kota</label>

                                <datalist id="datalistOptions">
                                    <?php foreach ($kota as $kotas) : ?>
                                    <option data-id="<?php echo $kotas->id_kota; ?>"
                                        data-provinsi="<?php echo $kotas->provinsi_id; ?>"
                                        value="<?php echo $kotas->nama_kota; ?>">
                                    </option>
                                    <?php endforeach; ?>
                                </datalist>

                                <input type="hidden" name="id_kota" id="id-kota">
                                <input type="hidden" name="id_provinsi" id="id-provinsi">
                            </div>
                        </div>
                        <div class="input-wrapper mt-3">
                            <input type="text" name="judul_properti" class="form-control" required>
                            <label for="judul_properti" class="label-in">Judul Properti</label>
                        </div>
                        <div class="row ">
                            <div class="input-wrapper mt-3 col-6">
                                <textarea name="alamat" id="alamat" class="form-control" required></textarea>
                                <label for="alamat" class="label-in">Alamat</label>
                            </div>
                            <div class="col-6 mt-4">
                                <select id="choices-multiple-remove-button" class="form-control"
                                    placeholder="Pilih Area Terdekat" multiple>
                                </select>
                            </div>
                        </div>
                        <div class="input-wrapper mt-3">
                            <input type="text" name="lokasi" class="form-control" required>
                            <label for="lokasi" class="label-in">Lokasi "( isi dg embed maps )"</label>
                        </div>

                        <!-- Data Detail Properti -->
                        <div class="alert alert-primary mt-4" role="alert">Detail Properti
                        </div>
                        <div class="input-wrapper">
                            <input type="number" name="jml_kamar" class="form-control" required>
                            <label for="jml_kamar" class="label-in">Jumlah Kamar</label>
                        </div>
                        <div class="input-wrapper mt-3">
                            <input type="number" name="jml_kamar_mandi" class="form-control" required>
                            <label for="jml_kamar_mandi" class="label-in">Jumlah Kamar Mandi</label>
                        </div>
                        <div class="input-wrapper mt-3">
                            <input type="number" name="luas_bangunan" class="form-control" required>
                            <label for="luas_bangunan" class="label-in">Luas Bangunan (m²)</label>
                        </div>
                        <div class="input-wrapper mt-3">
                            <input type="number" name="luas_tanah" class="form-control" required>
                            <label for="lusa_tanah" class="label-in">Luas Tanah (m²)</label>
                        </div>
                        <div class="input-wrapper mt-3">
                            <input type="number" name="daya_listrik" class="form-control" required>
                            <label for="daya_listrik" class="label-in">Daya Listrik (Watt)</label>
                        </div>
                        <div class="input-wrapper mt-3">
                            <input type="number" name="carport" class="form-control" required>
                            <label for="carport" class="label-in">Jumlah Carport</label>
                        </div>
                        <div class="input-wrapper mt-3">
                            <input type="number" name="ruang_tamu" class="form-control" required>
                            <label for="ruang_tamu" class="label-in">Ruang Tamu</label>
                        </div>
                        <div class="input-wrapper mt-3">
                            <input type=" number" name="taman" name="taman" class="form-control" required>
                            <label for="taman" class="label-in">Taman</label>
                        </div>
                        <div class="input-wrapper mt-3">
                            <input type=" number" name="ruang_makan" name="ruang_makan" class="form-control" required>
                            <label for=" ruang_makan" class="label-in">Ruang Makan</label>
                        </div>
                        <div class="row">
                            <div class="input-wrapper col-12 mt-3" id="level-wrapper">
                                <input type="number" id="level" name="level" class="form-control" required>
                                <label for="level" class="label-in">Jumlah Lantai</label>
                            </div>
                            <div class="input-wrapper mt-3 col-6" id="balkon-wrapper" style="display: none;">
                                <input type="number" id="balkon" name="balkon" class="form-control">
                                <label for="balkon" class="label-in">Balkon</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-wrapper mt-3 col-5">
                                <input type="number" name="harga" class="form-control" required>
                                <label for="harga" class="label-in">Harga (IDR)</label>
                            </div>
                            <div class="input-wrapper mt-3 col-3">
                                <input type="text" name="satuan" class="form-control" required>
                                <label for="satuan" class="label-in">Satuan</label>
                            </div>
                            <div class="input-wrapper  mt-3 col-4">
                                <input class="form-control" list="option-agent" id="data-agent"
                                    placeholder="Ketik nama agent...">
                                <label for="data-agent" class="label-in">Pilih Agent</label>
                                <datalist id="option-agent">
                                    <?php foreach ($agent as $agn) : ?>
                                    <option data-id="<?php echo $agn->id_agency; ?>"
                                        value="<?php echo $agn->nama_agent; ?>">
                                    </option>
                                    <?php endforeach; ?>
                                </datalist>
                                <input type="hidden" name="id_agency" id="id-agency">
                            </div>
                        </div>
                        <div class="input-wrapper mt-3">
                            <textarea name="deskripsi" class="form-control" required></textarea>
                            <label for="deskripsi" class="label-in">Deskripsi</label>
                        </div>

                        <!-- Data Fasilitas Properti -->
                        <div id="fasilitas-section" style="display:none;">
                            <div class="alert alert-warning mt-4" role="alert">Fasilitas Properti</div>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="input-wrapper">
                                        <input type="number" id="jalan" name="jalan"
                                            class="form-control form-control-sm" required>
                                        <label for="level" class="label-in">Jalan</label>
                                    </div>
                                </div>
                                <div class="col-md-3 p-0">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="taman_bermain"
                                            name="taman_bermain" value="1" />
                                        <label class="form-check-label" for="taman_bermain">Taman Bermain</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="area_ruko" name="area_ruko"
                                            value="1" />
                                        <label class="form-check-label" for="area_ruko">Area Ruko</label>
                                    </div>
                                </div>
                                <div class="col-md-3 p-0">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="kolam_renang"
                                            name="kolam_renang" value="1" />
                                        <label class="form-check-label" for="kolam_renang">Kolam Renang</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="one_gate" name="one_gate"
                                            value="1" />
                                        <label class="form-check-label" for="one_gate">One Gate</label>
                                    </div>
                                </div>
                                <div class="col-md-2 p-0">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="security" name="security"
                                            value="1" />
                                        <label class="form-check-label" for="security">Security</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="cctv" name="cctv"
                                            value="1" />
                                        <label class="form-check-label" for="cctv">CCTV</label>
                                    </div>
                                </div>
                                <div class="col-md-2 p-0">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="masjid" name="masjid"
                                            value="1" />
                                        <label class="form-check-label" for="masjid">Masjid</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Gambar Properti -->
                        <div class="alert alert-info mt-4" role="alert">Upload Gambar Properti
                            <div id="dropzone" class="dropzone mt-2"></div>
                            <div id="responseMessage" class="mt-3"></div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="submitProperti" class="btn btn-primary rounded-3">
                    <span class="d-none" id="loadingIcon" class="spinner-border spinner-border-sm" role="status"
                        aria-hidden="true"></span>
                    <span class="d-none" id="loadingText">Menyimpan...</span>
                    <span id="submitText"> Simpan</span>
                </button>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    // Inisialisasi Choices.js untuk elemen select
    var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
        removeItemButton: true,
        maxItemCount: 20,
        searchResultLimit: 10,
        renderChoiceLimit: 10
    });

    // Fungsi untuk mendapatkan tags berdasarkan id provinsi
    function fetchTagsForProvinsi(idProvinsi) {
        $.ajax({
            url: '<?= base_url('Properti/getKotaByProvinsi'); ?>',
            type: 'GET',
            data: {
                id_provinsi: idProvinsi
            },
            success: function(response) {
                // console.log('Response:', response);
                multipleCancelButton.clearStore();
                multipleCancelButton.clearChoices();

                try {
                    const kotaList = JSON.parse(response);
                    // console.log('Parsed kotaList:', kotaList);

                    if (Array.isArray(kotaList)) {
                        multipleCancelButton.setChoices(
                            kotaList.map(kota => ({
                                value: kota.nama_kota,
                                label: kota.nama_kota
                            })),
                            'value',
                            'label',
                            true
                        );
                    } else {
                        console.error('Data tidak valid:', kotaList);
                    }
                } catch (e) {
                    console.error('Error parsing JSON:', e, response);
                }
            },
            error: function(xhr, status, error) {
                console.error('Error fetching kota:', error);
            }
        });
    }

    // Event listener untuk input kota
    $('#exampleDataList').on('input', function() {
        var inputVal = $(this).val();
        var selectedOption = $('#datalistOptions option').filter(function() {
            return this.value == inputVal;
        });

        if (selectedOption.length) {
            var idProvinsi = selectedOption.data('provinsi');
            $('#id-kota').val(selectedOption.data('id'));
            $('#id-provinsi').val(idProvinsi);
            fetchTagsForProvinsi(idProvinsi);
        }
    });
});

// kode simpan properti
Dropzone.autoDiscover = false;

var myDropzone = new Dropzone("#dropzone", {
    url: "<?= base_url('Properti/store'); ?>",
    method: "post",
    paramName: "gambar_properti",
    maxFilesize: 3,
    acceptedFiles: "image/*",
    addRemoveLinks: false,
    autoProcessQueue: false,
    uploadMultiple: true,
    parallelUploads: 8,
    init: function() {
        var myDropzone = this;

        // Menambahkan tombol hapus kustom dengan gaya yang diinginkan
        this.on("addedfile", function(file) {
            // Buat elemen tombol hapus
            var removeButton = Dropzone.createElement(
                "<button type='button' class='btn btn-xs btn-outline-danger btn-remove'>Hapus</button>"
            );

            // Tambahkan tombol hapus ke elemen preview file
            file.previewElement.appendChild(removeButton);

            // Tambahkan event listener untuk menghapus file
            removeButton.addEventListener("click", function(e) {
                e.preventDefault();
                e.stopPropagation();
                myDropzone.removeFile(file);
            });

            // Tambahkan class dropzone ke elemen preview file
            $(file.previewElement).addClass('dz-preview');
        });

        // Ketika tombol submit diklik, proses semua file di antrian
        $("#submitProperti").click(function(e) {
            e.preventDefault();

            var id_kota = $('#id-kota').val();
            var id_type = $("input[name='id_nama']").val();
            var selectedTags = $('#choices-multiple-remove-button').val();

            if (!selectedTags || selectedTags.length === 0) {
                $("#responseMessage").html(
                    '<div class="alert alert-danger">Pilih area terdekat terlebih dahulu</div>'
                );
                return;
            }

            // Convert array to comma-separated string
            var area_terdekat = selectedTags.join(', ');

            if (!id_kota || !id_type) {
                $("#responseMessage").html(
                    '<div class="alert alert-danger">Pilih kota dan tipe properti terlebih dahulu</div>'
                );
                return;
            }

            // Serialize form data dan tambahkan ke Dropzone
            var formData = new FormData($("#jualPropertiForm")[0]);

            // Mengirim parameter form data ke Dropzone
            myDropzone.options.params = {
                id_kota: id_kota,
                id_type: id_type,
                penawaran: formData.get('penawaran'),
                judul_properti: formData.get('judul_properti'),
                alamat: formData.get('alamat'),
                lokasi: formData.get('lokasi'),
                jml_kamar: formData.get('jml_kamar'),
                jml_kamar_mandi: formData.get('jml_kamar_mandi'),
                luas_bangunan: formData.get('luas_bangunan'),
                luas_tanah: formData.get('luas_tanah'),
                level: formData.get('level'),
                daya_listrik: formData.get('daya_listrik'),
                carport: formData.get('carport'),
                ruang_tamu: formData.get('ruang_tamu'),
                taman: formData.get('taman'),
                ruang_makan: formData.get('ruang_makan'),
                balkon: formData.get('balkon'),
                harga: formData.get('harga'),
                satuan: formData.get('satuan'),
                id_agency: formData.get('id_agency'),
                deskripsi: formData.get('deskripsi'),
                jalan: formData.get('jalan'),
                masjid: formData.get('masjid'),
                taman_bermain: formData.get('taman_bermain'),
                area_ruko: formData.get('area_ruko'),
                kolam_renang: formData.get('kolam_renang'),
                one_gate: formData.get('one_gate'),
                security: formData.get('security'),
                cctv: formData.get('cctv'),
                area_terdekat: area_terdekat
            };

            $("#submitText").addClass('d-none');
            $("#loadingIcon").removeClass('d-none');
            $("#loadingText").removeClass('d-none');

            myDropzone.processQueue();
        });

        this.on("complete", function(file) {
            if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {
                $("#responseMessage").html(
                    '<div class="alert alert-success">Properti berhasil disimpan</div>'
                );

                Swal.fire({
                    position: 'top-center',
                    icon: 'success',
                    title: 'Berhasil!',
                    text: 'Data Properti berhasil disimpan.',
                    timer: 1500,
                    showConfirmButton: false
                });

                window.location.href =
                    "<?php echo base_url('Properti'); ?>";

                $('#add-properti').modal('hide');
                myDropzone.removeAllFiles();

                $("#loadingIcon").addClass('d-none');
                $("#loadingText").addClass('d-none');
                $("#submitText").removeClass('d-none');
            }
        });

        this.on("error", function(file, response) {
            console.error("Terjadi kesalahan saat mengunggah file: ", response);
            $("#responseMessage").html('<div class="alert alert-danger">Terjadi kesalahan: ' +
                response + '</div>');

            // Sembunyikan ikon dan teks loading
            $("#loadingIcon").addClass('d-none');
            $("#loadingText").addClass('d-none');
            $("#submitText").removeClass('d-none');
        });

        this.on("removedfile", function(file) {
            console.log("File dihapus");
        });
    }
});

$(".type-button").click(function() {
    var selectedType = $(this).data('type');
    var selectedId = $(this).data('id');

    $("input[name='id_type']").val(selectedType);
    $("input[name='id_nama']").val(selectedId);

    $("#form-container").show();

    if (selectedType === "Perumahan" || selectedType === "Apartment") {
        $("#fasilitas-section").show();
        $("#penawaran").hide();
    } else {
        $("#fasilitas-section").hide();
        $("#penawaran").show();
    }

    if (selectedType === "Perumahan") {
        $("#kota-list").removeClass("col-6").addClass("col-12");
    } else {
        $("#kota-list").removeClass("col-12").addClass("col-6");
    }
});


$('#data-agent').on('input', function() {
    var inputValagen = $(this).val();
    var selected = $('#option-agent option').filter(function() {
        return this.value == inputValagen;
    });
    $('#id-agency').val(selected.data('id'));
});

// memunculkan dan menyambunyikan input balkon
document.addEventListener('DOMContentLoaded', function() {
    var levelInput = document.getElementById('level');
    var balkonWrapper = document.getElementById('balkon-wrapper');
    var levelWrapper = document.getElementById('level-wrapper');

    levelInput.addEventListener('input', function() {
        var level = this.value;

        if (level < 2) {
            balkonWrapper.style.display = 'none';
            levelWrapper.classList.remove('col-6');
            levelWrapper.classList.add('col-12');
        } else {
            balkonWrapper.style.display = 'block';
            levelWrapper.classList.remove('col-12');
            levelWrapper.classList.add('col-6');
        }
    });
});

// kode list data properti
$(document).ready(function() {
    var limit = 3;
    var start = 0;
    var action = 'inactive';
    var total_pages = 1;

    function lazzy_loader(limit) {
        var output = '';
        for (var count = 0; count < limit; count++) {
            output += '<div class="post_data">';
            output += '<div class="image-placeholder content-placeholder">&nbsp;</div>';
            output += '<div class="details-placeholder">';
            output += '<div class="title-placeholder content-placeholder">&nbsp; </div>';
            output += '<div class="sub-title-placeholder content-placeholder">&nbsp;</div>';
            output += '<div class="price-placeholder content-placeholder">&nbsp;</div>';
            output += '</div>';
            output += '</div>';
        }
        $('#load_data_message').html(output);
    }

    lazzy_loader(limit);

    function load_data(limit, start, search = '') {
        $.ajax({
            url: "<?php echo base_url(); ?>Properti/fetch",
            method: "POST",
            data: {
                limit: limit,
                start: start,
                search: search
            },
            cache: false,
            success: function(data) {
                var response = JSON.parse(data);
                $('#load_data').html('');
                if (response.data.trim() === '') {
                    $('#load_data_message').html(
                        '<div class="alert alert-danger alert-dismissible shadow-lg p-3 mb-4" role="alert">' +
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                        '<span aria-hidden="true">&times;</span></button>' +
                        '<i class="fa fa-folder-open"></i> Data Properti Tidak Ada Lagi...</div>'
                    );
                    action = 'active';
                } else {
                    if (start === 0) {
                        $('#load_data').html(response.data);
                    } else {
                        $('#load_data').append(response.data);
                    }
                    $('#load_data_message').html("");
                    action = 'inactive';
                    total_pages = response.total_pages;
                    update_pagination();
                }
            }
        });
    }

    function update_pagination() {
        var paginationHtml =
            '<li class="page-item prev"><a class="page-link" href="javascript:void(0);"><i class="tf-icon bx bx-chevrons-left"></i></a></li>';

        for (var i = 1; i <= total_pages; i++) {
            paginationHtml += '<li class="page-item ' + (i === (start / limit) + 1 ? 'active' : '') +
                '"><a class="page-link" href="javascript:void(0);">' + i + '</a></li>';
        }

        paginationHtml +=
            '<li class="page-item next"><a class="page-link" href="javascript:void(0);"><i class="tf-icon bx bx-chevrons-right"></i></a></li>';

        $('.pagination').html(paginationHtml);
    }

    $('.pagination').on('click', '.page-item', function() {
        if ($(this).hasClass('prev')) {
            if (start >= limit) {
                start -= limit;
                load_data(limit, start, $('#search-properti').val());
            }
        } else if ($(this).hasClass('next')) {
            if (start + limit < total_pages * limit) {
                start += limit;
                load_data(limit, start, $('#search-properti').val());
            }
        } else {
            var page = parseInt($(this).find('.page-link').text());
            start = (page - 1) * limit;
            load_data(limit, start, $('#search-properti').val());
        }
    });

    load_data(limit, start);

    $('#search-properti').on('input', function() {
        var search = $(this).val();
        start = 0;
        load_data(limit, start, search);
    });
});
</script>