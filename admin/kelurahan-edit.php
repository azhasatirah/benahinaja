<!DOCTYPE html>
<html lang="en">
<?php require 'partials/head.php'; ?>
<title>Master Kelurahan | SIG - SAY</title>
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
                                <li class="breadcrumb-item active">Kelurahan</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!--  -->
                <?php
                    $updateId = $_GET['id'];
                    $selectKelurahan = "
                        SELECT * FROM master_kelurahan WHERE idkelurahan = '{$updateId}'
                    ";
                    $rs_selectKelurahan = querydb($selectKelurahan);
                    if (mysql_num_rows($rs_selectKelurahan)>0) {
                        $kelurahan;
                        while ($row = mysql_fetch_assoc($rs_selectKelurahan)) {
                            $kelurahan = $row;
                        }
                    } else { return "Data Kelurahan Kosong"; }


                    $selectKecamatan = "
                        SELECT idkecamatan, kodekecamatan, kecamatan, latitude, longitude, statusdata
                        FROM master_kecamatan
                        WHERE statusdata = '1'
                    ";
                    $rs_selectKecamatan = querydb($selectKecamatan);
                    if (mysql_num_rows($rs_selectKecamatan)>0) {
                        $allKecamatan = [];
                        while ($row = mysql_fetch_assoc($rs_selectKecamatan)) {
                            $allKecamatan[] = $row;
                        }
                    } else {
                        return "Data Kecamatan Kosong";
                    }

                ?>
                <!--  -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="kelurahan-process.php?id=<?php echo $kelurahan['idkelurahan']; ?>" method="POST" name="addKelurahan">
                                    <div class="form-body">
                                        <h3 class="card-title">Master Kelurahan</h3>
                                        <hr>
                                        <input type="hidden" name="method" value="update">
                                        <div class="form-group">
                                            <label class="control-label">Kecamatan</label>
                                            <select name="kecamatan" class="form-control custom-select" data-placeholder="Choose a kecamatan" tabindex="1">
                                                <?php foreach ($allKecamatan as $kecamatan) : ?>
                                                    <option value="<?php echo $kecamatan['idkecamatan'] ?>">
                                                        <?php echo $kecamatan['kecamatan'] ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Kode Kelurahan</label>
                                            <input type="text" name="kodekelurahan" class="form-control" value="<?php echo $kelurahan['kodekelurahan']; ?>" >
                                        </div>
                                        <div class="form-group">
                                            <label>Kode Lokasi</label>
                                            <input type="text" name="kodelokasi" class="form-control" value="<?php echo $kelurahan['kodelokasi']; ?>" >
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Kelurahan</label>
                                            <input type="text" name="nama" class="form-control" value="<?php echo $kelurahan['kelurahan']; ?>" >
                                        </div>
                                        <div class="form-group">
                                            <label>Latitude</label>
                                            <input type="text" name="latitude" class="form-control" value="<?php echo $kelurahan['latitude']; ?>" >
                                        </div>
                                        <div class="form-group">
                                            <label>Longitude</label>
                                            <input type="text" name="longitude" class="form-control" value="<?php echo $kelurahan['longitude']; ?>" >
                                        </div>
                                        <div class="float-md-right">
                                            <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Save</button>
                                            <a href="kelurahan.php" class="btn btn-inverse">Cancel</a>
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
