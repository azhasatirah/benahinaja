<!DOCTYPE html>
<html lang="en">
<?php require 'partials/head.php'; ?>
<title>Master Kecamatan | SIG - SAY</title>
<body class="skin-default-dark fixed-layout logo-center">
    <div id="main-wrapper">
        <?php require 'partials/header.php'; ?>
        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Mastering</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item">Mastering</li>
                                <li class="breadcrumb-item active">Kecamatan</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!--  -->
                <?php
                    if (isset($_POST['nama'])) {

                        $kode = $_POST['kode'];
                        $nama = $_POST['nama'];
                        $latitude = $_POST['latitude'];
                        $longitude = $_POST['longitude'];
                        $date = date("Y-m-d");
                        $insertKecamatan = "
                            INSERT INTO master_kecamatan(kodekecamatan, kecamatan, latitude, longitude, datecreated, statusdata)
                            VALUES ('{$kode}', '{$nama}', '{$latitude}', '{$longitude}', '{$date}', '1')
                        ";
                        $rs_insertKecamatan = querydb($insertKecamatan);
                        redirect('kecamatan.php');
                    } else {
                        echo "";
                    }
                ?>
                <!--  -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="" method="POST" name="addKecamatan">
                                    <div class="form-body">
                                        <h3 class="card-title">Master Kecamatan</h3>
                                        <hr>
                                        <div class="form-group">
                                            <label>Kode Kecamatan</label>
                                            <input type="text" name="kode" class="form-control" placeholder="023123">
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Kecamatan</label>
                                            <input type="text" name="nama" class="form-control" placeholder="Kecamatan ...">
                                        </div>
                                        <div class="form-group">
                                            <label>Latitude</label>
                                            <input type="text" name="latitude" class="form-control" placeholder="0231241">
                                        </div>
                                        <div class="form-group">
                                            <label>Longitude</label>
                                            <input type="text" name="longitude" class="form-control" placeholder="124123124">
                                        </div>
                                        <div class="float-md-right">
                                            <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Save</button>
                                            <a href="kecamatan.php" class="btn btn-inverse">Cancel</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php require 'partials/rightSidebar.php'; ?>
            </div>
        </div>
        <footer class="footer">
            © 2018 SIG - SAY
        </footer>
    </div>
    <?php require 'partials/foot.php'; ?>
</body>
</html>
