<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Laundry</title>

    <link href="../../assets/css/bootstrap-3.css" rel="stylesheet" />
    <link href="../../assets/css/semantic.css" rel="stylesheet" />
    <style>
        p.name {
            text-align: left;
            font-weight: 5px;
        }

        p.judul {
            text-align: center;
            font-weight: bold;
        }

        .container {
            border: 1px solid black;
            margin-top: 20px;
            width: 300px;
            font-size: 10px;
        }

        .border-fix {
            border: 1px solid black;
        }

        .mtop {
            margin-top: -10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-xs-8 col-xs-offset-2">
                <p class="judul"> Kuy Laundry <br>
                    Jalan Hayam Wuruk No 149
                    <br>+6281373230877</p>
            </div>
        </div>
        <br>

        <div class="row">
            <div class="col-xs-12 text-center">
                <div class="qrcode">
                    <canvas id="canvas"></canvas>
                </div>
                <button class="btn btn-default ui primary button" onclick="genQR()">QR Code</button>
            </div>
        </div>
        <hr>
        <?php foreach ($user as $row) : ?>
            <div class="row">
                <div class="col-xs-6">
                    <form name="random_form">
                        <label for="no_pemesanan">No Pemesanan :</label>
                        <input type="text" class="form-control ui input" name="disini" value="<?= $row->no_pemesanan; ?>" placeholder="No Pemesanan" style="width:100%">
                    </form>
                </div>
                <div class="col-xs-6 text-left">
                    <p class="name">
                        <input type="hidden" value="<?= $row->id_pemesanan; ?>">
                        <label for="nama_customer">Nama Customer :</label>
                        <input type="text" class="form-control ui input" placeholder="Nama Customer" value="<?= $row->nama_customer; ?>" style="width:100%;font-size:10px;">
                    </p>
                </div>
            </div>
            <hr>

            <div class="row">
                <div class="col-xs-6 text-left">
                    <p class="name">
                        <label for="nama_customer">Nama Customer :</label>
                        <input type="text" class="form-control ui input" placeholder="No Telp" value="<?= $row->no_telp_customer; ?>" style="width:100%;font-size:10px;">
                    </p>
                </div>
                <div class="col-xs-6 text-left">
                    <p class="name">
                        <label for="nama_kasir">Nama Kasir :</label>
                        <input type="text" class="form-control ui input" placeholder="Nama Kasir" value="<?= $row->nama_kasir; ?>" style="width:100%; font-size:10px;">
                    </p>
                </div>

                <!-- <div class="col-xs-6"><input type="button" class="btn btn-success ui primary button" value="No Pesanan" onClick="random_all();"></div> -->
            </div>
            <hr>
            <div class="row">
                <div class="col-xs-5">
                    <p class="name">
                        <label for="jam">Jam :</label>
                        <input type="time" class="form-control ui input" placeholder="Jam" value="<?= $row->waktu_pemesanan; ?>" style="width:100%;font-size:10px;"></p>
                </div>
                <div class="col-xs-7">
                    <p class="name">
                        <label for="tanggal">Tanggal :</label>
                        <input type="date" class="form-control ui input" placeholder="Tanggal" value="<?= $row->tanggal_pemesanan; ?>" style="width:100%;font-size:10px;"></p>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-xs-7">
                    <p class="name">
                        <label for="jenis_cucian">Jenis Cucian x Kg :</label>
                        <input type="text" class="form-control ui input" placeholder="Jenis Cucian x Kg =" value="<?= ($row->jenis_cucian == 1000 ? 'Baju' : $row->jenis_cucian = 3000 ? 'Boneka' : '') . '&nbsp; x &nbsp;' . $row->berat_cucian; ?>" style="width:100%;font-size:10px;"></p>
                </div>
                <div class="col-xs-5">
                    <p class="name">
                        <label for="total keseluruhan">Total Keseluruhan :</label>
                        <input type="text" class="form-control ui input a" placeholder="Total Cucian" value="<?= $row->total_pemesanan; ?>" style="width:100%;font-size:10px;" onkeyup="hitung();"></p>
                </div>
            </div>

            <!-- <div class="row">
                <div class="col-xs-8">SETRIKA BAJU 2KG</div>
            </div>
            <div class="row">
                <div class="col-xs-4 text-left">2 x 3500</div>
                <div class="col-xs-4 col-xs-offset-4">7000</div><hr width="86%"> 
            </div>

            <div class="row">
                <div class="col-xs-8">CUCI BONEKA 2 KG</div>
            </div> 
            <div class="row">
                <div class="col-xs-4 text-left">2 X 7000</div>
                <div class="col-xs-4 col-xs-offset-4">14.000</div><hr width="85%"> 
            </div>
            <div class="row">
                <div class="col-xs-4 text-left">TOTAL</div>
                <div class="col-xs-4 col-xs-offset-4">33.000</div>
            </div> -->
            <hr>
            <div class="row">
                <div class="col-xs-6 ">Bayar :</div>
                <div class="col-xs-6 ">
                    <p class="name"><input type="text" class="form-control ui input b" placeholder="Bayar" value="" style="width:100%;font-size:10px;" onkeyup="hitung();"></p>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-xs-6">Kembalian :</div>
                <div class="col-xs-6 ">
                    <p class="name"><input type="text" class="form-control ui input c" placeholder="Kembalian" value="" style="width:100%;font-size:10px;" readonly></p>
                </div>
            </div>
            <hr>
        <?php endforeach; ?>
        <div class="row">
            <div class="col-xs-12 text-center">
                <p class="judul">CUCIAN YANG TELAH DIBAWA PULANG DILUAR TANGGUNG JAWAB KAMI</p>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 text-center">
                <p class="judul">TERIMAKASIH TELAH MEMAKAI JASA KUY LAUNDRY</p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-xs-12 text-center">
                <input type="button" value="Batal" class="btn ui primary button" onClick="window.location.href='<?= base_url('admin') ?>';">
                <input type="button" value="Print" class="btn ui primary button" onClick="window.print()">
            </div>
        </div>
        <br>
    </div>


    <script src="../../assets/js/jquery-1.10.2.js"></script>
    <script src="../../assets/js/bootstrap-3.min.js"></script>
    <script src="../../assets/js/qrcode.min.js"></script>
    <script language="javascript" type="text/javascript">
        function genQR(str) {
            var str = document.querySelector("input").value;
            QRCode.toCanvas(document.getElementById("canvas"), str, function(error) {
                if (error) console.error(error);
                console.log("success!");
            });
        }

        function random_all() {
            var campur = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZ";
            var panjang = 9;
            var random_all = '';
            for (var i = 0; i < panjang; i++) {
                var hasil = Math.floor(Math.random() * campur.length);
                random_all += campur.substring(hasil, hasil + 1);
            }
            document.random_form.disini.value = random_all;
        }

        function hitung() {
            var a = $(".a").val();
            var b = $(".b").val();
            c = b - a;
            $(".c").val(c);
        }
    </script>
</body>

</html>