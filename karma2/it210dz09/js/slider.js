
function markaID() {
    $(document).ready(function () {
        $('#marka').change(function () {
            //slektovana marka
            var id_marka = $(this).val();
            $.ajax({
                url: "../dodajArtikal.php",
                type: "POST",
                data: {markaID: id_marka},
                dataType: "text",
                success: function (html) {
                    $('#model').html(html);
                }
            })
        });
    });
}
