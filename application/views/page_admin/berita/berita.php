<style>
.note-editor {
    margin-bottom: 1rem !important;
}

.btn-group-sm>.btn,
.btn-sm {
    padding: 5px 10px;
    font-size: 12px;
    line-height: 1.5;
    border-radius: 3px;
}

.btn-default {
    color: #333;
    background-color: #fff;
    border-color: #ccc;
}

.open>.dropdown-menu {
    display: block;
}

.dropdown-menu {
    position: absolute;
    top: 100%;
    left: 0;
    z-index: 1000;
    display: none;
    float: left;
    min-width: 160px;
    padding: 5px 0;
    margin: 2px 0 0;
    font-size: 14px;
    text-align: left;
    list-style: none;
    background-color: #fff;
    -webkit-background-clip: padding-box;
    background-clip: padding-box;
    border: 1px solid #ccc;
    border: 1px solid rgba(0, 0, 0, .15);
    border-radius: 4px;
    -webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, .175);
    box-shadow: 0 6px 12px rgba(0, 0, 0, .175);
}

.btn-toolbar .btn-group,
.btn-toolbar .input-group {
    float: left;
}

.btn-group,
.btn-group-vertical {
    position: relative;
    display: inline-block;
    vertical-align: middle;
}

.btn-group-vertical>.btn-group:after,
.btn-toolbar:after,
.clearfix:after,
.container-fluid:after,
.container:after,
.dl-horizontal dd:after,
.form-horizontal .form-group:after,
.modal-footer:after,
.nav:after,
.navbar-collapse:after,
.navbar-header:after,
.navbar:after,
.pager:after,
.panel-body:after,
.row:after {
    clear: both;
}

.btn-group-vertical>.btn-group:after,
.btn-group-vertical>.btn-group:before,
.btn-toolbar:after,
.btn-toolbar:before,
.clearfix:after,
.clearfix:before,
.container-fluid:after,
.container-fluid:before,
.container:after,
.container:before,
.dl-horizontal dd:after,
.dl-horizontal dd:before,
.form-horizontal .form-group:after,
.form-horizontal .form-group:before,
.modal-footer:after,
.modal-footer:before,
.nav:after,
.nav:before,
.navbar-collapse:after,
.navbar-collapse:before,
.navbar-header:after,
.navbar-header:before,
.navbar:after,
.navbar:before,
.pager:after,
.pager:before,
.panel-body:after,
.panel-body:before,
.row:after,
.row:before {
    display: table;
    content: " ";
}

:after,
:before {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}

.dropdown-menu>li>a {
    display: block;
    padding: 3px 20px;
    clear: both;
    font-weight: 400;
    line-height: 1.42857143;
    color: #333;
    white-space: nowrap;
}

.dropdown-menu>li>a {
    display: block;
    padding: 3px 20px;
    clear: both;
    font-weight: 400;
    line-height: 1.42857143;
    color: #333;
    white-space: nowrap;
}

.select2-container {
    width: -webkit-fill-available !important;
}

.card-icon {
    padding: 0px 10px;
    background-image: linear-gradient(#1A44B2, #8358DF, #129BCD);
    place-self: center;
    font-size: 37px;
    border-radius: 8px;
    text-align: center;
    color: #fff;
}

.border-card {
    border-radius: 14px;
    padding: 4px 17px;
    border: solid 3px #0000001f;
}

.active {
    box-shadow: inset 0 0px 15px #2196f37a;
    border: none;
}
</style>
<div class="container-xxl flex-grow-1 container-p-y pt-0">
    <main id="main" class="pt-5rem">
        <div class="m-3 mt-2">
            <div id="form-berita" class="row" hidden>
                <div class="card shadow bg-transparent border border-primary mb-0">
                    <div class="card-body">
                        <div class="col-lg-6 col-md-6 col-12 mt-2">
                            <label for="nm-perum">Judul Berita</label>
                            <div class="form-group">
                                <input type="text" id="judul-berita" class="form-control" placeholder="Judul Berita ..."
                                    autocomplete="off" required="true">
                            </div>

                            <label for="nm-perum">Meta deskripsi</label>
                            <div class="form-group">
                                <input type="text" id="meta-desk" class="form-control" placeholder="Deskripsi ..."
                                    autocomplete="off" required="true">
                            </div>

                            <label>Tgl terbit Berita</label>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="padding: 10px;">
                                            <i class="far fa-calendar-alt"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" id="tgl-berita" value="">
                                </div>
                            </div>
                            <label for="select-kota">Tag</label>
                            <div class="form-group">
                                <select id="select-tag" class="js-states form-control col-12">
                                </select>
                            </div>
                            <div class="input-group input-tag">
                                <input type="text" id="tag-berita" class="form-control " placeholder="...">
                            </div>
                            <div class="form-group">
                                <label for="pilih-foto-berita">Foto berita</label>
                                <div class="input-group">
                                    <input type="file" id="file-foto-berita" name="berita" class="file-berita" value=""
                                        hidden>
                                    <input type="text" class="form-control pilih-berita" placeholder="Upload Foto"
                                        id="nm-foto-berita">
                                    <div class="input-group-append">
                                        <button type="button" id="browse-foto-berita" class="browse btn btn-dark">Pilih
                                            Foto</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 mt-2">
                            <div class="form-group">
                                <img src="" id="preview-foto-berita" class=" img-thumbnail img-fluid">
                                <input type="text" id="foto-lama" hidden>
                                <input type="text" id="meta-foto-lama" hidden>
                            </div>
                            <div id="ceklis-ubah-berita" class="form-group" hidden>
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox" id="ceklis-ubah-foto-berita"
                                        value="">
                                    <label for="ceklis-ubah-foto-berita" class="custom-control-label">Cheklis untuk
                                        mengubah
                                        foto</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="content-berita" class="row" hidden>
                <div id="content-row">
                    <div class="form-group">
                        <label class="">Page Content</label>
                        <div class="">
                            <textarea class="form-control" id="code_preview0" name="" style="height: 300px;"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label for="">Gambar</label>
                            <div class="input-group">
                                <input type="text" id="foto-btn-lama" class="" value="" hidden>
                                <input type="file" id="file-foto-btn" class="foto-btn" value="" hidden>
                                <input type="text" class="form-control pilih-foto-btn" readonly=""
                                    placeholder="Upload Gambar" id="nm-foto-btn">
                                <div class="input-group-append">
                                    <button type="button" id="btn-pilih-foto-btn"
                                        class="pilih-foto-btn browse btn btn-dark">Pilih Foto</button>
                                    <button type="button" id="btn-delete-foto-btn" class="browse btn btn-danger"
                                        style="display: none;" value="">Hapus Foto</button>
                                </div>
                            </div>
                            <label for="link-btn">Link</label>
                            <div class="input-group">
                                <input type="text" id="link-btn" class="form-control" value="">
                            </div>
                        </div>
                        <div class="col-6">
                            <img id="preview-foto-btn" src="" class="img-thumbnail" style="max-height: 20rem;">
                        </div>
                    </div>

                </div>
                <!-- </div> -->
            </div>
            <div id="foto-berita" class="row" hidden></div>
            <div class="demo-inline-spacing mb-1 ml-0" style="margin-left: -10px;">
                <button type="button" class="btn-batal-berita btn btn-sm btn-outline-danger" hidden>
                    <i class="fa-regular fa-pen-to-square"></i> Batal
                </button>

                <button type="button" class="btn-tambah-berita btn btn-sm btn-primary rounded-2" data-bs-toggle="modal"
                    data-bs-target="#add-agent" style="margin-left: -10px;">
                    Tambah Article
                </button>

                <button type="button" class="btn-simpan-berita btn btn-sm float-right btn-outline-success"
                    value="simpan" hidden>
                    <i class="fa-regular fa-pen-to-square"></i> Simpan data berita
                </button>
            </div>
            <input type="text" id="filter" value="All" hidden>
            <input type="text" id="id-berita" hidden>
            <input type="text" id="id-data-berita" hidden>
            <input type="text" id="id-foto-berita" hidden>
        </div>
        <ul class="nav row gy-4 d-flex mb-3" role="tablist">
            <li class="nav-item col-12 col-md-4 col-lg-3" role="presentation">
                <a class="filter card border-card nav-link show active" data-filter="All" data-bs-toggle="tab">
                    <div class="row">
                        <div class="col-xxl-2 col-lg-3 card-icon"><i class="fa-regular fa-newspaper fa-beat"
                                style="font-size: 28px;"></i></div>
                        <div class="col-xxl-10 col-lg-9" style="text-align-last: end;">
                            <p class="mb-0" style="letter-spacing: 3px;font-weight: bolder;">Artikel</p>
                            <span id="all" class=""></span>
                        </div>
                    </div>
                </a>
            </li>
            <li class="nav-item col-12 col-md-4 col-lg-3" role="presentation">
                <a class="filter card border-card nav-link" data-bs-toggle="tab" data-filter="Permintaan">
                    <div class="row">
                        <div class="col-xxl-2 col-lg-3 card-icon"><i class="fa-solid fa-spinner fa-spin-pulse"
                                style="font-size: 28px;"></i></div>
                        <div class="col-xxl-10 col-lg-9" style="text-align-last: end;">
                            <p class="mb-0 text-warning" style="letter-spacing: 3px;font-weight: bolder;">Permintaan</p>
                            <span id="permintaan" class=" text-warning"></span>
                        </div>
                    </div>
                </a>
            </li>
            <li class="nav-item col-12 col-md-4 col-lg-3" role="presentation">
                <a class="filter card border-card nav-link" data-bs-toggle="tab" data-filter="Terindex">
                    <div class="row">
                        <div class="col-xxl-2 col-lg-3 card-icon"><i class="fa-regular fa-circle-check fa-fade"
                                style="font-size: 28px;"></i></div>
                        <div class="col-xxl-10 col-lg-9" style="text-align-last: end;">
                            <p class="mb-0 text-success" style="letter-spacing: 3px;font-weight: bolder;">Terindex</p>
                            <span id="terindex" class="text-success"></span>
                        </div>
                    </div>
                </a>
            </li><!-- End Tab 1 Nav -->
            <li class="nav-item col-12 col-md-4 col-lg-3" role="presentation">
                <a class="filter card border-card nav-link" data-bs-toggle="tab" data-filter="Error">
                    <div class="row">
                        <div class="col-xxl-2 col-lg-3 card-icon"><i class="fa-solid fa-circle-exclamation fa-shake"
                                style="font-size: 28px;"></i></div>
                        <div class="col-xxl-10 col-lg-9" style="text-align-last: end;">
                            <p class="mb-0 text-danger" style="letter-spacing: 3px;font-weight: bolder;">Error</p>
                            <span id="error" class=" text-danger"></span>
                        </div>
                    </div>
                </a>
            </li>
        </ul>
        <div id="data-berita"></div>
        <div id="script-load-count-berita"></div>
    </main>
</div>