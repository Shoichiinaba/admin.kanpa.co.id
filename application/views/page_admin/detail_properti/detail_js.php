<!-- Load Bootstrap CSS dan JS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>

<!-- Load Summernote CSS dan JS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>


<!-- code modal untuk input promo -->
<div class="modal fade" id="buat-promo" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel3">Tambah Promo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <input type="hidden" id="id-properti" value="<?=$this->uri->segment(3);?>" class="form-control" />
                </div>
                <div class="row g-2">
                    <div class="col-12 mt-3">
                        <textarea id="summernote" name="promo_description"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="btn-save" class="btn btn-primary">
                    Simpan
                    <span id="loading-spinner" class="spinner-border spinner-border-sm ms-2" style="display: none;"
                        role="status" aria-hidden="true"></span>
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit Promo -->
<div class="modal fade" id="edit-promo-modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel3">Edit Promo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="edit-id-promo">
                <input type="hidden" id="edit-id-properti">
                <div class="form-group">
                    <textarea id="edit-nama-promo" class="form-control"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="save-edit-promo" class="btn btn-primary">
                    Ubah
                    <span id="loading-spinner-edit" class="spinner-border spinner-border-sm ms-2" style="display: none;"
                        role="status" aria-hidden="true"></span>
                </button>
            </div>
        </div>
    </div>
</div>



<script>
$(document).ready(function() {
    var baseUrl = "<?php echo base_url(); ?>";

    function lazzy_loader() {
        var output = '';
        output += '<div class="post_data">';
        output += '<div class="image-placeholder content-placeholder">&nbsp;</div>';
        output += '<div class="details-placeholder">';
        output += '<div class="title-placeholder content-placeholder">&nbsp;</div>';
        output += '<div class="sub-title-placeholder content-placeholder">&nbsp;</div>';
        output += '<div class="price-placeholder content-placeholder">&nbsp;</div>';
        output += '<p><span class="content-placeholder" style="width:100%; height: 30px;">&nbsp;</span></p>';
        output += '<p><span class="content-placeholder" style="width:100%; height: 100px;">&nbsp;</span></p>';
        output += '<div class="sub-title-placeholder content-placeholder">&nbsp;</div>';
        output += '<div class="price-placeholder content-placeholder">&nbsp;</div>';
        output += '</div>';
        output += '</div>';
        $('#lazy-loader').html(output);
    }

    lazzy_loader();

    setTimeout(function() {
        $('#lazy-loader').hide();
        $('#carousel-content').show();
    }, 2000);

    // kode input promo
    $('#summernote').on('summernote.init', function() {
        // Disable tombol dropdown
        $('.note-btn.dropdown-toggle').prop('enable', true);
    });

    $('#summernote').summernote({
        height: 300,
        placeholder: 'Masukkan deskripsi promo...',
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'italic', 'underline', 'clear', 'fontname', 'fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video', 'hr']],
            ['view', ['fullscreen', 'codeview', 'help']],
            ['misc', ['undo', 'redo']]
        ],
        fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New', 'Merriweather'],
        fontSizes: ['8', '9', '10', '11', '12', '14', '16', '18', '20', '22', '24', '28', '30', '36',
            '48', '64', '82', '150'
        ]
    });

    // Fungsi untuk menyimpan data promo
    $('#btn-save').on('click', function() {
        var id_properti = $('#id-properti').val();
        var nama_promo = $('#summernote').val();

        $('#loading-spinner').show();
        $('#btn-save').prop('disabled', true);

        $.ajax({
            url: baseUrl + "Properti/save_promo",
            method: "POST",
            data: {
                id_properti: id_properti,
                nama_promo: nama_promo
            },
            success: function(response) {
                var data = JSON.parse(response);
                if (data.status === 'success') {
                    Swal.fire({
                        position: 'top-center',
                        icon: 'success',
                        title: 'Berhasil!',
                        text: 'Promo berhasil disimpan.',
                        timer: 1500,
                        showConfirmButton: false
                    });
                    $('#buat-promo').modal('hide');
                    location.reload();
                } else {
                    alert(data.message);
                }
            },
            error: function() {
                alert('Terjadi kesalahan. Silakan coba lagi.');
            },
            complete: function() {
                $('#loading-spinner').hide();
                $('#btn-save').prop('disabled', false);
            }
        });
    });
});

$(document).ready(function() {
    $('#edit-nama-promo').summernote({
        height: 200,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'italic', 'underline', 'clear']],
            ['fontname', ['fontname']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ]
    });

    $('.btn-edit-promo').on('click', function() {
        var id_promo = $(this).data('id');

        $.ajax({
            url: '<?= base_url("Properti/get_promo_by_id"); ?>',
            type: 'POST',
            data: {
                id_promo: id_promo
            },
            dataType: 'json',
            success: function(data) {
                $('#edit-id-promo').val(data.id_promo);
                $('#edit-id-properti').val(data.id_properti);
                $('#edit-nama-promo').summernote('code', data.nama_promo);
                $('#edit-promo-modal').modal('show');
            }
        });
    });

    $('#save-edit-promo').on('click', function() {
        var id_promo = $('#edit-id-promo').val();
        var id_properti = $('#edit-id-properti').val();
        var nama_promo = $('#edit-nama-promo').val();

        $('#loading-spinner-edit').show();
        $('#save-edit-promo').prop('disabled', true);

        $.ajax({
            url: '<?= base_url("Properti/update_promo"); ?>',
            type: 'POST',
            data: {
                id_promo: id_promo,
                id_properti: id_properti,
                nama_promo: nama_promo
            },
            beforeSend: function() {
                $('#loading-spinner-edit').show();
                $('#save-edit-promo').prop('disabled', true);
            },
            success: function(response) {
                $('#save-edit-promo').attr('disabled', false).text('Save');
                $('#edit-promo-modal').modal('hide');
                Swal.fire({
                    position: 'top-center',
                    icon: 'success',
                    title: 'Berhasil!',
                    text: 'Promo berhasil diupdate.',
                    timer: 1500,
                    showConfirmButton: false
                });

                location.reload();
            }
        });
    });
});
</script>