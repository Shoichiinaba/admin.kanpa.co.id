<script>
$('#gambar-preview').empty();
if (gambar) {
    var gambarArray = gambar.split(',');
    var hasImage = false;

    $.each(gambarArray, function(index, value) {
        $.ajax({
            url: '<?= base_url("upload/gambar_properti/") ?>' + value,
            type: 'HEAD',
            success: function() {
                $('#gambar-preview').append(
                    '<div class="gambar-item">' +
                    '<img src="<?= base_url("upload/gambar_properti/") ?>' + value +
                    '" alt="Preview Gambar" class="d-block rounded">' +
                    '<span class="hapus-gambar" data-gambar="' + value + '">' +
                    '<i class="bx bx-trash"></i>' +
                    '</span>' +
                    '</div>'
                );
            },
            error: function() {
                console.warn(value + ' tidak ditemukan.');
            }
        });
    });

    // Tambahkan tombol tambah foto dan input file yang tersembunyi
    $('#gambar-preview').append(
        '<div class="tambah-foto-wrapper">' +
        '<button id="btnTambahFoto" class="tambah-foto-btn">' +
        '<i class="bx bx-image-add"></i> Tambahkan Foto' +
        '</button>' +
        '<input type="file" id="uploadGambar" accept="image/*" multiple style="display:none">' +
        // Input file dengan multiple upload
        '</div>'
    );
} else {
    $('#gambar-preview').html('<p>Tidak ada gambar yang tersedia.</p>');
}

// Event listener untuk membuka dialog upload gambar saat tombol tambah foto diklik
$(document).on('click', '#btnTambahFoto', function() {
    $('#uploadGambar').click(); // Trigger klik input file
});

// Event listener untuk menangani upload gambar setelah dipilih
$(document).on('change', '#uploadGambar', function(event) {
    var files = event.target.files; // Ambil semua file yang dipilih
    var totalFiles = files.length;

    if (totalFiles > 0) {
        for (var i = 0; i < totalFiles; i++) {
            var file = files[i];
            var reader = new FileReader();

            reader.onload = function(e) {
                // Tambahkan pratinjau gambar ke dalam gambar-preview
                $('#gambar-preview').append(
                    '<div class="gambar-item">' +
                    '<img src="' + e.target.result + '" alt="Preview Gambar" class="d-block rounded">' +
                    '<span class="hapus-gambar" data-gambar="' + file.name + '">' +
                    '<i class="bx bx-trash"></i>' +
                    '</span>' +
                    '</div>'
                );
            };
            reader.readAsDataURL(file); // Membaca file dan menghasilkan URL untuk ditampilkan di pratinjau
        }

        // Tampilkan tombol simpan setelah gambar di-upload
        if ($('#btnSimpanGambar').length === 0) {
            $('#gambar-preview').after(
                '<button id="btnSimpanGambar" class="btn btn-primary mt-3">Simpan Gambar</button>'
            );
        }
    }
});

// Event listener untuk menyimpan gambar ke server
$(document).on('click', '#btnSimpanGambar', function() {
    var formData = new FormData();
    var files = $('#uploadGambar')[0].files;

    // Ambil id_properti dari input hidden
    var idProperti = $('#hiddenIdProperti').val();

    if (files.length > 0) {
        // Tambahkan gambar ke formData
        for (var i = 0; i < files.length; i++) {
            formData.append('gambar[]', files[i]);
        }

        // Tambahkan id_properti ke formData
        formData.append('id_properti', idProperti);

        $.ajax({
            url: '<?= base_url("Properti/upload_gambar") ?>',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                alert('Gambar berhasil diunggah!');
                // Lakukan aksi lain setelah berhasil mengunggah
            },
            error: function(xhr, status, error) {
                alert('Gagal mengunggah gambar: ' + error);
            }
        });
    } else {
        alert('Tidak ada gambar yang dipilih.');
    }
});


function loadGambar(idProperti) {
    $('#gambar-preview').empty();

    // Ambil gambar dari server (ganti dengan endpoint yang sesuai untuk mendapatkan gambar)
    $.ajax({
        url: '<?= base_url("Properti/get_gambar") ?>',
        type: 'POST',
        data: {
            id_properti: idProperti
        },
        dataType: 'json',
        success: function(response) {
            // Mengakses gambar dari response
            if (response.gambar && response.gambar.length > 0) {
                $.each(response.gambar, function(index, gambarData) {
                    var gambarName = gambarData.gambar; // Ambil nama gambar dari objek

                    $('#gambar-preview').append(
                        '<div class="gambar-item">' +
                        '<img src="<?= base_url("upload/gambar_properti/") ?>' +
                        gambarName +
                        '" alt="Preview Gambar" class="d-block rounded">' +
                        '<span class="hapus-gambar" data-gambar="' +
                        gambarName + '">' +
                        '<i class="bx bx-trash"></i>' +
                        '</span>' +
                        '</div>'
                    );
                });

                // Tambahkan tombol tambah foto dan input file yang tersembunyi
                $('#gambar-preview').append(
                    '<div class="tambah-foto-wrapper">' +
                    '<button id="btnTambahFoto" class="tambah-foto-btn">' +
                    '<i class="bx bx-image-add"></i> Tambahkan Foto' +
                    '</button>' +
                    '<input type="file" id="uploadGambar" accept="image/*" multiple style="display:none">' +
                    '</div>'
                );
            } else {
                $('#gambar-preview').html('<p>Tidak ada gambar yang tersedia.</p>');
            }
        },
        error: function() {
            $('#gambar-preview').html('<p>Gagal memuat gambar.</p>');
        }
    });
}
</script>