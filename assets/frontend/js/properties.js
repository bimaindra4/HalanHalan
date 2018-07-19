function getSubkategori(val) {
	$.ajax({
        url: "jquery/subkategori.php",
        type: "GET",
        data: {"kat": val},
        success: function(data) {
            $("#subkategori").html(data);
        }
    });
}

function getKecamatan(val) {
    $.ajax({
        url: "jquery/kecamatan.php",
        type: "GET",
        data: {"id": val},
        success: function(data) {
            $("#kecamatan").html(data);
        }
    });
}

function cariTempat() {
    var kat = $("#kategori").val();
    var prForm = $("#primaryForm").serialize();
    var scForm = $("#secondaryForm").serialize();
    var concat = prForm+"&"+scForm;

    $.ajax({
        url: "jquery/cari_tempat.php",
        type: "GET",
        data: concat,
        success: function(data) {
            $("#tableQueries").html(data);
        }
    });

    if(kat == "Tempat Makan") {
        $(".tblLat").hide();
        $(".tblLong").hide();
    } else {
        $(".tblLat").show();
        $(".tblLong").show();
    }

    // Filter kategori tempat
    //kategoriShow(kat);
}