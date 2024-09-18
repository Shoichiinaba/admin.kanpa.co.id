<script>
$(document).ready(function() {
    // Function to load map colors
    function loadMapColors(id_prov) {
        setTimeout(function() {
            var map = $('.cls-2');
            var data = new FormData();
            var param = [];

            for (var i = 0; i < map.length; i++) {
                if (map[i].id) {
                    param[i] = map[i].id;
                    data.append('id[]', map[i].id);
                }
            }
            $.ajax({
                url: "<?php echo base_url('Maps/allColor'); ?>",
                data: data,
                type: 'GET',
                processData: false,
                contentType: false,
                success: function(data) {
                    for (var i = 0; i < data.results.length; i++) {
                        var path = data.results[i];
                        var element = $(`#${path.code}`);
                        element.css('fill', path.color);
                    }
                }
            });
        }, 2000);
    }

    $('.nav-link').on('click', function() {
        var mapId = $(this).data('id');
        var id_prov = $(this).data('id_prov');

        $.ajax({
            url: '<?php echo base_url('Maps/get_map'); ?>',
            type: 'POST',
            data: {
                id: mapId,
                id_prov: id_prov
            },
            success: function(response) {
                var data;
                try {
                    data = JSON.parse(response);
                } catch (e) {
                    console.error('Error parsing JSON:', e);
                    return;
                }

                var targetTab = $(`#map-${mapId}`);

                if (data.error) {
                    targetTab.find('.error-message-container').html(`
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        ${data.error}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                `);
                } else {
                    var svgMap = data.svg_map;
                    targetTab.html(svgMap);
                    loadMapColors(id_prov);
                }
            },
            error: function(xhr, status, error) {
                console.error('Terjadi kesalahan:', error);
                var targetTab = $(`#map-${mapId}`);
                targetTab.find('.error-message-container').html(`
                <div class="alert alert-danger alert-dismissible" role="alert">
                    Terjadi kesalahan saat mengambil data.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            `);
            }
        });
    });

    $('.nav-link.active').click();

});
</script>