<style>
.border-content {
    border: 2px solid;
    border-radius: 3px;
    padding: 9px;
}

*,
*::before,
*::after {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.gallery {
    --anim-time--hi: 266ms;
    --anim-time--med: 400ms;
    --anim-time--lo: 600ms;

    display: flex;
    place-content: center;
    max-width: clamp(30rem, 95%, 50rem);
    width: max(22.5rem, 100%);
    min-height: 100vh;
    margin-inline: auto;
    padding: clamp(0px, (30rem - 100vw) * 9999, 1rem);

}

.gallery__content--flow {
    display: flex;
    flex-wrap: wrap;
    gap: 1rem;
}

.gallery__content--flow>* {
    flex-grow: 1;
    flex-basis: calc((30rem - 100%) * 999);
}

figure {
    display: flex;
    min-width: 14rem;
    /* max-height: 16rem; */
    position: relative;
    border-radius: .35rem;
    box-shadow:
        rgb(40, 40, 40, 0.1) 0px 2px 3px,
        rgb(20, 20, 20, 0.2) 0px 5px 8px,
        rgb(0, 0, 0, 0.25) 0px 10px 12px;
    overflow: hidden;
    transition: transform var(--anim-time--med) ease;
}

figure::before {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(to top,
            hsla(0, 0%, 0%, 0.8) 0%,
            hsla(0, 0%, 0%, 0.7) 12%,
            hsla(0, 0%, 0%, 0.2) 41.6%,
            hsla(0, 0%, 0%, 0.125) 50%,
            hsla(0, 0%, 0%, 0.01) 59.9%,
            hsla(0, 0%, 0%, 0) 100%);
    opacity: 0;
    transition-property: opacity, transform;
    transition-duration: var(--anim-time--med), var(--anim-time--med);
    transition-timing-function: ease, ease;
    z-index: 4;
}

.header__caption {
    z-index: 10;
    position: absolute;
    display: inline-flex;
    flex-direction: column;
    align-self: flex-end;
    width: 100%;
    gap: 0.5rem;
    padding: 1rem;
    justify-content: center;
    text-align: center;
    transform: translateY(100%);
    transition: transform var(--anim-time--hi) linear,
        opacity var(--anim-time--hi) linear;
}

figure:hover::before {
    opacity: 0.8;
}

figure:hover .header__caption {
    transform: translateY(0);
    opacity: 1;
}

figure:hover .img-grid-news {
    transform: scale(1);
}

.title {
    color: #fff;

}

.title--primary {
    font-size: 1.25rem;
    font-weight: bold;
}

.title--secondary {
    text-transform: uppercase;
    font-weight: bold;
}

.img-grid-news {
    display: block;
    width: 100%;
    object-fit: cover;
    object-position: center;
    height: 100%;
    transform: scale(1.15);
    aspect-ratio: 16 / 13;
    transition: 400ms ease-in-out;
}
</style>
<div class="form-group" hidden>
    <div class="input-group">
        <input type="file" id="file-foto-berita-other" name="berita" class="file-berita-other" value="" hidden>
        <input type="text" class="form-control" placeholder="Upload Foto" id="nm-foto-berita-other">
        <div class="input-group-append">
            <button type="button" id="" class="pilih-berita-other browse btn btn-dark">Pilih Foto</button>
        </div>
    </div>
</div>
<?php
foreach ($data_artikel_berita as $data) {
    $id_data_berita = $data->id_data_berita;
    $berita_id = $data->berita_id
?>

<div class="row">
    <div class="col-2">
        <figure id="data-meta-foto" class="pilih-foto-meta-berita">
            <figcaption class="header__caption" role="presentation">
                <h2 class="title title--secondary">
                    <button type="button" id="" class="pilih-foto-meta-berita browse btn btn-info">Pilih Foto</button>
                </h2>
            </figcaption>
        </figure>
    </div>
</div>
<div class="form-group" hidden>
    <div class="input-group">
        <input type="file" id="file-foto-meta-berita" name="berita" class="file-berita-meta" value="" hidden>
        <input type="text" class="form-control" placeholder="Upload Foto" id="nm-foto-meta-berita">
        <div class="input-group-append">
            <button type="button" id="" class="pilih-berita-meta browse btn btn-dark">Pilih Foto</button>
        </div>
    </div>
</div>
<div class="border-content">
    <div id="galeri<?php echo $id_data_berita; ?>" class=" gallery__content--flow">
        <div class="row">

            <?php
                foreach ($data_foto_berita as $foto) :
                    if ($id_data_berita == $foto->data_berita_id) {

                ?>
            <div class="col-3">

                <figure>
                    <img src="<?php echo base_url('upload/article'); ?>/<?php echo $foto->file_foto_berita; ?>"
                        class="img-grid-news"
                        alt="A light brown, long-haired chihuahua sitting next to three rubber duckies. "
                        title="Photo by Giacomo Lucarini for Unsplash">
                    <figcaption class="header__caption" role="presentation">
                        <h2 class="title title--secondary">
                            <button type="button" id="" data-id-foto-berita="<?php echo $foto->id_foto_berita; ?>"
                                data-file-foto-berita="<?php echo $foto->file_foto_berita; ?>"
                                class="btn-hapus-foto-berita-other browse btn btn-danger">Hapus Foto</button>
                        </h2>
                    </figcaption>
                </figure>
            </div>
            <?php
                    } else {
                    }
                endforeach;
                ?>
            <div class="col-3">

                <figure class="pilih-berita-other" data-id-data-berita="<?php echo $data->id_data_berita; ?>">
                    <img id="preview-foto-berita-other<?php echo $data->id_data_berita; ?>"
                        src="https://media.istockphoto.com/id/1365197728/id/vektor/tambahkan-plus-tombol-cross-round-medis-ikon-vektor-3d-gaya-kartun-minimal.jpg?s=612x612&w=0&k=20&c=NKmTHM4TqtP5AuSrB779A6iMvktncz9t33fspLQWxlQ="
                        class="img-grid-news">
                    <figcaption class="header__caption" role="presentation">
                        <h2 class="title title--secondary">
                            <button type="button" id="" class="browse btn btn-info">Pilih Foto</button>
                        </h2>
                    </figcaption>
                </figure>
            </div>
        </div>
    </div>
    <div class="row">

        <div class="col">
            <button type="button" class="btn-simpan-foto col-12 mt-3 btn btn-sm btn-outline-success"><i
                    class="fa-regular fa-pen-to-square"></i> Simpan Foto</button>
        </div>
    </div>
    <hr>
    <span class="text-berita<?php echo $data->id_data_berita; ?>"><?php echo $data->text_berita; ?></span>
    <center>
        <a href="<?= $data->link_btn; ?>" target="_blank">
            <img src="<?php echo base_url('upload/article'); ?>/<?php echo $data->file_foto_btn; ?>" class="img-fluid"
                alt="" style="width: 25rem;">
        </a>
    </center>
    <hr>
    <div class="row">
        <div class="col-6">
            <button type="button" class="btn-hapus-catatan btn btn-sm btn-outline-danger"
                data-id-data-berita="<?php echo $data->id_data_berita; ?>"><i class="fa-regular fa-pen-to-square"></i>
                Hapus Catatan</button>
        </div>
        <div class="col-6">
            <button type="button" class="btn-edit-catatan float-right btn btn-sm btn-outline-warning"
                data-id-data-berita="<?php echo $data->id_data_berita; ?>"
                data-file-foto-btn="<?= $data->file_foto_btn; ?>" data-link-btn="<?= $data->link_btn; ?>"><i
                    class="fa-regular fa-pen-to-square"></i> Edit Catatan</button>
        </div>
    </div>
</div>
<?php
}
?>
<div class="row mt-2">
    <div class="col">
        <!-- <a href="#page"> -->
        <button type="button" class="btn-tambah-catatan col-12 btn btn-sm btn-outline-info"><i
                class="fa-regular fa-pen-to-square"></i> Tambah Catatan</button>
        <!-- </a> -->
    </div>
</div>
<input type="hidden" id="meta-foto" value="">
<script>
$('.btn-hapus-catatan').click(function(e) {
    $('#id-data-berita').val($(this).data('id-data-berita'));
    var confirmalert = confirm("Are you sure?");
    if (confirmalert == true) {
        // alert($(this).data('id-foto-berita') + $(this).data('file-foto-berita'));
        let formData = new FormData();
        formData.append('id-data-berita', $(this).data('id-data-berita'));
        $.ajax({
            type: 'POST',
            url: "<?php echo site_url('berita/delete_content') ?>",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(msg) {
                alert('Catatan berhasil di hapus');
                load_data_content_berita();

            },
            error: function() {
                alert("Data Gagal Diupload");
            }
        });
    }
});
$('.btn-simpan-foto').click(function(e) {
    var id_data_berita = $('#id-data-berita').val();
    const foto_berita = $('#file-foto-berita-other').prop('files')[0];
    let formData = new FormData();
    formData.append('foto-berita-other', foto_berita);
    formData.append('id-berita', id_data_berita);
    $.ajax({
        type: 'POST',
        url: "<?php echo site_url('berita/simpan_foto_berita'); ?>",
        data: formData,
        cache: false,
        processData: false,
        contentType: false,
        success: function(data) {
            alert('berhasil')
            // form_default();
            load_data_content_berita();

        },
        error: function() {
            alert("Data Gagal Diupload");
        }
    });
});
$('.btn-tambah-catatan').click(function(e) {
    form_default();
    text_editor();
    const element = document.getElementById("page");
    element.scrollIntoView();
});

function text_editor() {
    $('.btn-simpan-berita').val('add-content');
    $('#content-berita').removeAttr('hidden', true);
    $('.btn-tambah-berita').attr('hidden', true);
    $('.btn-simpan-berita, .btn-batal-berita').removeAttr('hidden', true);
}

$('.btn-edit-catatan').click(function(e) {
    text_editor();
    $('.btn-simpan-berita').val('edit-content');
    $('#id-data-berita').val($(this).data('id-data-berita'));
    $("#code_preview0").code($('.text-berita' + $(this).data('id-data-berita')).code());
    if ($(this).data('file-foto-btn') == '') {

        $('#link-btn').val('');
        $('#nm-foto-btn, #foto-btn-lama').val('');
        $('#preview-foto-btn').attr({
            src: ''
        });
        $('#btn-delete-foto-btn').hide();
        $('#btn-pilih-foto-btn').show();
    } else {
        $('#link-btn').val($(this).data('link-btn'));
        $('#nm-foto-btn, #btn-delete-foto-btn').val($(this).data('file-foto-btn'));
        $('#preview-foto-btn').attr({
            src: '<?= base_url('upload/article/'); ?>' + $(this).data('file-foto-btn')
        });
        $('#btn-delete-foto-btn').show();
        $('#btn-pilih-foto-btn').hide();

    }
    const element = document.getElementById("page");
    element.scrollIntoView();
});
$('.btn-hapus-foto-berita-other').click(function() {
    var el = this;
    var confirmalert = confirm("Are you sure?");
    if (confirmalert == true) {
        // alert($(this).data('id-foto-berita') + $(this).data('file-foto-berita'));
        let formData = new FormData();
        formData.append('id-foto-berita', $(this).data('id-foto-berita'));
        formData.append('file-foto-berita', $(this).data('file-foto-berita'));
        $.ajax({
            type: 'POST',
            url: "<?php echo site_url('berita/delete_foto_berita') ?>",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(msg) {
                alert('Foto berhasil di hapus');
                load_data_content_berita();

            },
            error: function() {
                alert("Data Gagal Diupload");
            }
        });
    }

})
$('#file-foto-berita-other').change(function(e) {
    var id_data_berita = $('#id-data-berita').val();
    alert(id_data_berita)
    var fileName = e.target.files[0].name;
    $("#nm-foto-berita-other").val(fileName);

    var reader = new FileReader();
    reader.onload = function(e) {
        // get loaded data and render thumbnail.
        document.getElementById("preview-foto-berita-other" + id_data_berita).src = e.target.result;
    };
    // read the image file as a data URL.
    reader.readAsDataURL(this.files[0]);
});

$('#file-foto-meta-berita').change(function(e) {
    // var id_data_berita = $('#id-data-berita').val();
    // alert(id_data_berita)
    var fileName = e.target.files[0].name;
    $("#nm-foto-meta-berita").val(fileName);

    var reader = new FileReader();
    reader.onload = function(e) {
        // get loaded data and render thumbnail.
        document.getElementById("preview-foto-meta-berita").src = e.target.result;
    };
    // read the image file as a data URL.
    reader.readAsDataURL(this.files[0]);
    const foto_meta_berita = $('#file-foto-meta-berita').prop('files')[0];
    let formData = new FormData();
    formData.append('id-berita', $('#id-berita').val());
    formData.append('meta-foto', foto_meta_berita);
    $.ajax({
        type: 'POST',
        url: "<?php echo site_url('berita/add_meta_foto') ?>",
        data: formData,
        cache: false,
        processData: false,
        contentType: false,
        success: function(msg) {
            alert('Foto berhasil di hapus');
            // load_data_content_berita();

        },
        error: function() {
            alert("Data Gagal Diupload");
        }
    });
});
</script>