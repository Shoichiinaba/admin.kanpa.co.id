<style>
/* css loader */
@-webkit-keyframes placeHolderShimmer {
    0% {
        background-position: -468px 0;
    }

    100% {
        background-position: 468px 0;
    }
}

@keyframes placeHolderShimmer {
    0% {
        background-position: -468px 0;
    }

    100% {
        background-position: 468px 0;
    }
}

.content-placeholder {
    display: inline-block;
    -webkit-animation-duration: 1s;
    animation-duration: 1s;
    -webkit-animation-fill-mode: forwards;
    animation-fill-mode: forwards;
    -webkit-animation-iteration-count: infinite;
    animation-iteration-count: infinite;
    -webkit-animation-name: placeHolderShimmer;
    animation-name: placeHolderShimmer;
    -webkit-animation-timing-function: linear;
    animation-timing-function: linear;
    background: #f6f7f8;
    background: -webkit-gradient(linear, left top, right top, color-stop(8%, #eeeeee), color-stop(18%, #dddddd), color-stop(33%, #eeeeee));
    background: -webkit-linear-gradient(left, #eeeeee 8%, #dddddd 18%, #eeeeee 33%);
    background: linear-gradient(to right, #eeeeee 8%, #dddddd 18%, #eeeeee 33%);
    -webkit-background-size: 800px 104px;
    background-size: 800px 104px;
    height: inherit;
    position: relative;
    border-radius: 5px;
}

.post_data {
    padding: 16px;
    border: 1px solid #f0f0f0;
    border-radius: 10px;
    margin-bottom: 24px;
    background-color: #fff;
    box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
    display: flex;
    align-items: center;
}

/* css halaman data properti */

.image-placeholder {
    width: 100px;
    height: 100px;
    border-radius: 8px;
    margin-right: 16px;
}

.details-placeholder {
    width: calc(100% - 120px);
}

.title-placeholder {
    width: 70%;
    height: 20px;
    margin-bottom: 8px;
}

.sub-title-placeholder {
    width: 50%;
    height: 20px;
    margin-bottom: 8px;
}

.price-placeholder {
    width: 40%;
    height: 30px;
    margin-bottom: 8px;
}


.image-pro {
    flex: 0 0 auto;
    width: 29%;
    margin-left: inherit;
}

.harga {
    color: #1A44B2;
    font-weight: bold;
}

.unit {
    color: black;
    font-weight: bold;
}

.tayang {
    font-size: smaller;
}

.pagin {
    position: relative;
}

.desk {
    flex: 1 1 auto;
    padding: 0.1rem 0.1rem;
}

.tombol {
    flex: 0 0 auto;
    width: 96px;
}

.tombol button:hover .icon-img {
    filter: brightness(0) invert(1);
}

/* css inputan */
.input-wrapper {
    position: relative;
    line-height: 14px;
    margin: 0 0px;
    display: grid;
}

.label-in {
    color: #bbb;
    font-size: 11px;
    text-transform: uppercase;
    position: absolute;
    z-index: 2;
    left: 20px;
    top: 14px;
    padding: 0 2px;
    pointer-events: none;
    background: #fff;
    -webkit-transition: -webkit-transform 100ms ease;
    -moz-transition: -moz-transform 100ms ease;
    -o-transition: -o-transform 100ms ease;
    -ms-transition: -ms-transform 100ms ease;
    transition: transform 100ms ease;
    -webkit-transform: translateY(-20px);
    -moz-transform: translateY(-20px);
    -o-transform: translateY(-20px);
    -ms-transform: translateY(-20px);
    transform: translateY(-20px);
}

.form-control,
textarea,
select {
    font-size: 12px;
    color: #555;
    outline: none;
    border: 1px solid #bbb;
    padding: 15px 20px 10px;
    border-radius: 10px;
    position: relative;
}

.form-control:invalid+label,
select:invalid+label,
textarea:invalid+label {
    -webkit-transform: translateY(0);
    -moz-transform: translateY(0);
    -o-transform: translateY(0);
    -ms-transform: translateY(0);
    transform: translateY(0);
}

.form-control:focus,
select:focus,
textarea:focus {
    border-color: #1A44B2;
}

.form-control:focus+label,
select:focus+label,
textarea:focus+label {
    color: #2b96f1;
    -webkit-transform: translateY(-20px);
    -moz-transform: translateY(-20px);
    -o-transform: translateY(-20px);
    -ms-transform: translateY(-20px);
    transform: translateY(-20px);
}

.dropzone .dz-preview {
    position: relative;
}

.dropzone .dz-preview .btn-remove {
    position: absolute;
    top: 98px;
    right: 30px;
    display: none;
    z-index: 10;
    border-radius: 23%;
}

.dropzone .dz-preview:hover .btn-remove {
    display: block;
}

/* kode untuk menampilkan tombol lihat detail properti */
.image-pro {
    position: relative;
    overflow: hidden;
}

.image-pro img {
    display: block;
    width: 100%;
    height: auto;
}

.btn-view {
    display: none;
    position: absolute;
    top: 39%;
    left: 40%;
    transform: translate(-4%, -9%);
    padding: 1px 6px;
    background-color: rgba(0, 0, 0, 0.6);
    color: #fff;
    border-radius: 10px;
    text-decoration: none;
    font-size: 11px;
}

.image-pro:hover .btn-view {
    display: block;
}
</style>

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="demo-inline-spacing mb-3">
        <button type="button" class="btn btn-sm btn-primary rounded-2" data-bs-toggle="modal"
            data-bs-target="#add-properti">Tambah Properti</button>
    </div>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h5 class="mb-0">Daftar Properti</h5>
        </div>
        <form class="d-flex" style="width: 200px;">
            <div class="input-group">
                <span class="input-group-text"><i class="tf-icons bx bx-search"></i></span>
                <input type="text" id="search-properti" class="form-control" placeholder="Search..." />
            </div>
        </form>
    </div>

    <div class="row mb-0" id="load_data">
    </div>
    <div id="load_data_message"></div>
    <!-- Pagination -->
    <div class="d-flex justify-content-center">
        <nav aria-label="Page navigation">
            <ul class="pagination pagination-sm">
                <li class="page-item prev">
                    <a class="page-link" href="javascript:void(0);"><i class="tf-icon bx bx-chevrons-left"></i></a>
                </li>
                <li class="page-item active">
                    <a class="page-link" href="javascript:void(0);">1</a>
                </li>
                <li class="page-item next">
                    <a class="page-link" href="javascript:void(0);"><i class="tf-icon bx bx-chevrons-right"></i></a>
                </li>
            </ul>
        </nav>
    </div>
</div>