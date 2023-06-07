<?php
    include 'fungsi.php';
    $jumlah = new Jumlah();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iKantin</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
</head>
<style>
    body {
        background: #4F709C;
    }

    button {
        background: #ffff;
    }

    .modal-header {
        background-color: #213555;
        color: #fff;
    }
</style>
<body>
    <nav class="navbar-inverse" role="navigation">
        <div class="container-fluid">
            <ul class="nav navbar-nav">
                <li class="active"><a href="index.php"><i class="fa fa-home"></i>Beranda</a></li>
                <li><a href="#" data-toggle="modal" data-target="#buy"><i class="fa fa-shopping-cart"></i> Beli</a></li>
            </ul>
        </div>
    </nav>

    <div class="container" style="margin-top:50px;">
        <div class="panel-body bg-primary" style="background-color: #213555; border-radius: 10px;">
            <h1>Selamat Datang di iKantin Wikrama</h1>
        </div>

    <div class="panel panel-default">
        <div class="container">
            <div class="col-md-10">
                <h4>Klik disini untuk pembelian <button type="button" class="btn btn-primary" name="button" data-toggle="modal" data-target="#buy">Beli</button></h4>
            </div>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-body">
            <div class="container">
            <?php 
                 if (isset($_POST['check'])) {
                    $jmlcilok = $_POST['cilok'];
                    $jmlMochi = $_POST['mochi'];
                            if ($jmlcilok == null) {
                                $jumlah ->getJumlah (0,$jmlMochi);
                            }elseif ($jmlMochi == null) {
                                $jumlah->getJumlah($jmlcilok,0);
                            }elseif ($jmlcilok == null && $jmlMochi == null) {
                                $jumlah->getJumlah(0,0);
                            }else {
                                $jumlah->getJumlah($jmlcilok,$jmlMochi);
                            }
                    $jumlah->setHarga();
                    $jumlah->cetakStruk();
                 }
                ?>
            </div>
        </div>
    </div>

    </div>

    <br>
    <br>
    <div class="modal fade" id="buy" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
       <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="border-radius: 5px 5px 0px 0px;">
                <h4 class="modal-title" id=""> Form Pembelian </h4>
            </div>
            <div class="modal-body">
                <form class="form-grup" action="" method="post">
                    <div class="input-grup">
                        <span class="input-grup-addon"><i class="fa fa-cutlery"></i></span>
                        <input type="number" class="form-control" name="cilok" id="cilok" placeholder="Masukan Jumlah Cilok Yang Dibeli *" readOnly>
                    </div>
                    <div class="input-grup">
                        <span class="input-grup-addon"><i class="fa fa-cutlery"></i></span>
                        <input type="number" class="form-control" name="mochi" id="mochi" placeholder="Masukan Jumlah Mochi Yang Dibeli *" readOnly>
                    </div>
                    <br>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btncilok" onclick="Onlycilok()" class="btn btn-primary" style="float:left;">Cilok</button>
                    <button type="button" id="btnmochi" onclick="Onlymochi()" class="btn btn-primary" style="float:left;">Mochi</button>
                    <button type="button" onclick="Keduanya()" class="btn btn-primary" style="float: left;"> Cilok & Mochi </button>
                    <button type="button" onclick="exit()" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Close </button>
                    <button type="submit" class="btn btn-primary" name="check"><i class="fa fa-check"></i> Cek Total </button>
                </div>
            </form>
        </div>
       </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</body>
</html>
<script type="text/javascript">
    function Onlycilok() {
        document.getElementById("cilok").readOnly = false;
        document.getElementById("mochi").readOnly = true;

        document.getElementById("btnmochi").disabled = false;
        document.getElementById("btncilok").disabled = true;
    }

    function Onlybakwan() {
        document.getElementById("cilok").readOnly = true;
        document.getElementById("mochi").readOnly = false;

        document.getElementById("btnmochi").disabled = true;
        document.getElementById("btncilok").disabled = false;
    }

    function Keduanya() {
        document.getElementById("cilok").readOnly = false;
        document.getElementById("mochi").readOnly = false;

        document.getElementById("btnmochi").disabled = false;
        document.getElementById("btncilok").disabled = false;
    }

    function Exit() {
        document.getElementById("cilok").readOnly = true;
        document.getElementById("mochi").readOnly = true;
    }
</script>