<!-- Footer -->
<footer class="page-footer font-small bg-info pt-4">
    <!-- Footer Links -->
    <div class="container-fluid text-center text-md-left">
    </div>
    <!-- Footer Links -->
    <!-- Copyright -->
    <div class="footer-copyright text-center py-3" style="background-color: #31c2db; color:white; height:50px; font-size:13px; padding-top:15px;">
        <a href="https://ideku-reserved.com/" style="font:15 serif; font-weight:bold; color:white"> Ideku-reserved.com <?= date('Y'); ?></a>
    </div>
    <!-- Copyright -->
</footer>
<!-- Footer -->
</div>
<!-- /. WRAPPER  -->
<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->

<script src="<?= base_url('assets/js/jquery-1.10.2.js'); ?>"></script>

<script src="<?= base_url('assets/js/bootstrap-3.min.js'); ?>"></script>

<script src="<?= base_url('assets/js/jquery.metisMenu.js'); ?>"></script>

<script src="<?= base_url('assets/js/jquery.dataTables.min.js'); ?>"></script>

<script src="<?= base_url('assets/js/dataTables.bootstrap.min.js'); ?>"></script>

<script src="<?= base_url('assets/js/custom.js'); ?>"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
    $(document).ready(function() {
        $('#pelanggan').DataTable();
    });
    $(document).ready(function() {
        $('#omzet').DataTable();
    });
    $(document).ready(function() {
        $('#unomzet').DataTable();
    });
    $(document).ready(function() {
        $('#clearOmzet').DataTable();
    });
    $(document).ready(function() {
        $('#omz-this-month').DataTable();
    });
    $(document).ready(function() {
        $('#penghasilan-bersih').DataTable();
    });
    $(document).ready(function() {
        $('#beban').DataTable();
    });
    $(document).ready(function() {
        $('#laba-rugi-kotor').DataTable();
    });
    //============================================ Nanti yang dibawah dipakek kok ===========================//
    // $(document).ready(function() {
    //     $('#jenis_cuci').DataTable();
    // });
    // $(document).ready(function() {
    //     $('#paket_cuci').DataTable();
    // });
    // $(document).ready(function() {
    //     $('#bahan_cuci').DataTable();
    // });
    //============================================== Datatables js ===================================//





    //==================================###----Index Add----###==================================//
    function startCalc() {
        interval = setInterval("calc()", 1);
    }

    function calc() {
        jenis = document.formDataPemesanan.jenis_cucian.value;
        paket = document.formDataPemesanan.paket_cucian.value;
        berat = document.formDataPemesanan.berat_cucian.value;
        parfum = document.formDataPemesanan.parfum_cucian.value;
        document.formDataPemesanan.total_pemesanan.value = (jenis * 1) + (paket * 1) + (parfum * 1);
        var result = document.formDataPemesanan.total_pemesanan.value;
        document.formDataPemesanan.total_pemesanan.value = result * berat;
    }

    function stopCalc() {
        clearInterval(interval);
    }
    //==================================###----Index Add----###==================================//

    //==================================###----Index Edit----###==================================//

    //======================================== Pre Edit =========================================//
    $("#paket_cucian").on("change", function() {

        // ambil nilai
        var paket = $("#paket_cucian option:selected").attr("value");

        // pindahkan nilai ke input
        $("#paketCuci").val(paket);

    });
    $("#jenis_cucian").on("change", function() {

        // ambil nilai
        var jenis = $("#jenis_cucian option:selected").attr("value");

        // pindahkan nilai ke input
        $("#jenisCuci").val(jenis);

    });
    $("#parfum_cucian").on("change", function() {

        // ambil nilai
        var parfum = $("#parfum_cucian option:selected").attr("value");

        // pindahkan nilai ke input
        $("#parfumCuci").val(parfum);

    });
    //======================================== Pre Edit =========================================//
    $(document).ready(function() {
        $("#beratCuci").on("change", function() {
            var jenisCuci = parseInt($("#jenisCuci").val());
            var paketCuci = parseInt($("#paketCuci").val());
            var parfumCuci = parseInt($("#parfumCuci").val());
            var beratCuci = parseInt($("#beratCuci").val());
            var totalCuci = beratCuci * (jenisCuci + paketCuci + parfumCuci);
            $("#totalPemesanan").val(totalCuci);
        });
    });

    //==================================###----Index Edit----###==================================//






    //==================================###----Stok----###==================================//

    //==================================###----Add----###==================================//
    $(document).ready(function() {
        $("#jumlah_barang").on("change", function() {
            var harga = parseInt($("#harga_satuan").val());
            var jumlah = parseInt($("#jumlah_barang").val());
            var totalharbar = harga * jumlah;
            $("#total_harga_barang").val(totalharbar);
        });
    });

    $(document).ready(function() {
        $("#digunakan").on("change", function() {
            var jumlah = parseInt($("#jumlah_barang").val());
            var digunakan = parseInt($("#digunakan").val());
            var tersedia = jumlah - digunakan;
            $("#tersedia").val(tersedia);
        });
    });
    //==================================###----Add----###==================================//
    //==================================###----Edit----###==================================//
    // $(document).ready(function() {
    //     // Untuk sunting
    //     $('#edit-ongkos').on('show.bs.modal', function(event) {
    //         var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
    //         var modal = $(this)

    //         // Isi nilai pada field
    //         modal.find('#id_ongkos').attr("value", div.data('id-ongkos'));
    //         modal.find('#listrik-Ongkos').attr("value", div.data('listrik'));
    //         modal.find('#pajak-Ongkos').attr("value", div.data('pajak'));
    //         modal.find('#total_harga_barang-Ongkos').attr("value", div.data('totharbar'));
    //         modal.find('#total_gaji_pegawai-Ongkos').attr("value", div.data('totgajpeg'));
    //         modal.find('#total_ongkos-Ongkos').attr("value", div.data('totong'));
    //         modal.find('#tanggal_ongkos-Ongkos').attr("value", div.data('tangos'));
    //     });

    //     $(".total_gaji_pegawai").on("change", function() {
    //         var listrik = parseInt($(".listrik").val());
    //         var pajak = parseInt($(".pajak").val());
    //         var totharba = parseInt($(".total_harga_barang").val());
    //         var totgajpeg = parseInt($(".total_gaji_pegawai").val());
    //         var totong = listrik + pajak + totharba + totgajpeg;
    //         $(".total_ongkos").val(totong);
    //     });
    // });
    //==================================###----Edit----###==================================//
    //==================================###----Stok----###==================================//





    //==================================###----Ongkos----###==================================//

    //==================================###----Add----###==================================//
    $(document).ready(function() {
        $("#total_gaji_pegawai").on("change", function() {
            var listrik = parseInt($("#listrik").val());
            var pajak = parseInt($("#pajak").val());
            var totharba = parseInt($("#total_harga_barang").val());
            var totgajpeg = parseInt($("#total_gaji_pegawai").val());
            var totong = listrik + pajak + totharba + totgajpeg;
            $("#total_ongkos").val(totong);
        });
    });
    //==================================###----Add----###==================================//
    //==================================###----Modal Edit Ongkos----###==================================//
    $(document).ready(function() {
        // Untuk sunting
        $('#edit-ongkos').on('show.bs.modal', function(event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal = $(this)

            // Isi nilai pada field
            modal.find('#id_ongkos').attr("value", div.data('id-ongkos'));
            modal.find('#listrik-Ongkos').attr("value", div.data('listrik'));
            modal.find('#pajak-Ongkos').attr("value", div.data('pajak'));
            modal.find('#total_harga_barang-Ongkos').attr("value", div.data('totharbar'));
            modal.find('#total_gaji_pegawai-Ongkos').attr("value", div.data('totgajpeg'));
            modal.find('#total_ongkos-Ongkos').attr("value", div.data('totong'));
            modal.find('#tanggal_ongkos-Ongkos').attr("value", div.data('tangos'));
        });

        $(".total_gaji_pegawai").on("change", function() {
            var listrik = parseInt($(".listrik").val());
            var pajak = parseInt($(".pajak").val());
            var totharba = parseInt($(".total_harga_barang").val());
            var totgajpeg = parseInt($(".total_gaji_pegawai").val());
            var totong = listrik + pajak + totharba + totgajpeg;
            $(".total_ongkos").val(totong);
        });
    });
    //==================================###----Modal Edit Ongkos----###==================================//

    //==================================###----Ongkos----###==================================//




    //Gak ada inputannya
    //==================================###----Modal Edit Data Pegawai----###==================================//
    $(document).ready(function() {
        // Untuk sunting
        $('#edit-data-pegawai').on('show.bs.modal', function(event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal = $(this)

            // Isi nilai pada field
            modal.find('#id_absen').attr("value", div.data('id'));
            modal.find('#nama_pegawai').attr("value", div.data('nama'));
            modal.find('#tanggal_keluar').attr("value", div.data('bulan'));
            modal.find('#status_aktif').attr("value", div.data('status'));
        });
    });
    //==================================###----Modal Edit Data Pegawai----###==================================//





    //==================================###----Gaji Pegawai----###==================================//

    //==================================###----Add----###==================================//
    $(document).ready(function() {
        $("#gaji_bonus").on("change", function() {
            var pokok = parseInt($("#gaji_pokok").val());
            var bonus = parseInt($("#gaji_bonus").val());
            var total = pokok + bonus
            $("#total_gaji_pegawai").val(total);
        });
    });
    //==================================###----Add----###==================================//
    //==================================###----Modal Edit Gaji Pegawai----###==================================//
    $(document).ready(function() {
        // Untuk sunting
        $('#edit-gaji').on('show.bs.modal', function(event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal = $(this)

            // Isi nilai pada field
            modal.find('#id_gaji').attr("value", div.data('id'));
            modal.find('#nama_pegawai').attr("value", div.data('nama'));
            modal.find('#tanggal_gaji').attr("value", div.data('tanggal'));
            modal.find('#gaji_pokok').attr("value", div.data('pokok'));
            modal.find('#gaji_bonus').attr("value", div.data('bonus'));
            modal.find('#total_gaji_pegawai').attr("value", div.data('total'));
        });

        $(".bonus").on("change", function() {
            var pokok = parseInt($(".pokok").val());
            var bonus = parseInt($(".bonus").val());
            var total = pokok + bonus;
            $(".total").val(total);
        });
    });
    //==================================###----Modal Edit Gaji Pegawai----###==================================//

    //==================================###----Gaji Pegawai----###==================================//
</script>
</body>

</html>