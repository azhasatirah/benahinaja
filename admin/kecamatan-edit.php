<!DOCTYPE html>
<html lang="en">
<?php require 'partials/head.php'; ?>
<!-- icheck css -->
<link href="assets/icheck/skins/all.css" rel="stylesheet">
<link href="dist/css/pages/form-icheck.css" rel="stylesheet">
<!-- Dropzone css -->
<link href="assets/dropzone-master/dist/dropzone.css" rel="stylesheet" type="text/css" />
<!-- form-material css -->
<link href="dist/css/pages/file-upload.css" rel="stylesheet">
<!-- form upload -->
<link rel="stylesheet" href="assets/dropify/dist/css/dropify.min.css">

<title>Master Kecamatan | SIG - SAY</title>
<body class="skin-default-dark fixed-layout logo-center">
    <!-- <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">SIG-SAY</p>
        </div>
    </div> -->
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
                                <li class="breadcrumb-item active">Master Kecamatan</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!--  -->
                <?php
                    $Id = $_GET['id']; 
                    $selectKecamatan = "
                            SELECT * FROM master_kecamatan WHERE idkecamatan = '{$Id}'
                        ";
                        $rs_selectKecamatan = querydb($selectKecamatan);
                        if (mysql_num_rows($rs_selectKecamatan)>0) {
                            $kecamatan;
                            while ($row = mysql_fetch_assoc($rs_selectKecamatan)) {
                                $kecamatan = $row;
                            }
                        } else { return "Data Kecamatan Kosong"; }

                ?>
                <!--  -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="kecamatan-process.php?id=<?php echo $kecamatan['idkecamatan']; ?>" method="POST" name="addKecamatan" enctype="multipart/form-data">
                                    <div class="form-body">
                                        <h3 class="card-title">Master Kecamatan</h3>
                                        <hr>
                                        <input type="hidden" name="method" value="update">
                                        <div class="form-group">
                                            <label>Kode Kecamatan</label>
                                            <input type="text" name="kode" class="form-control" value="<?php echo $kecamatan['kodekecamatan']?>" >
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Kecamatan</label>
                                            <input type="text" name="nama" class="form-control" value="<?php echo $kecamatan['kecamatan']?>" >
                                        </div>
                                        <div class="form-group">
                                            <label>Latitude</label>
                                            <input type="text" name="latitude" class="form-control" value="<?php echo $kecamatan['latitude']?>" >
                                        </div>
                                        <div class="form-group">
                                            <label>Longitude</label>
                                            <input type="text" name="longitude" class="form-control" value="<?php echo $kecamatan['longitude']?>" >
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

    <script src="dist/js/pages/jasny-bootstrap.js"></script>
    <!-- icheck -->
    <script src="assets/icheck/icheck.min.js"></script>
    <script src="assets/icheck/icheck.init.js"></script>
    <!-- Dropzone Plugin JavaScript -->
    <script src="assets/dropzone-master/dist/dropzone.js"></script>
    <!-- jQuery file upload -->
    <script src="assets/dropify/dist/js/dropify.min.js"></script>
    <script>
    $(document).ready(function() {
        // Basic
        $('.dropify').dropify();

        // Translated
        $('.dropify-fr').dropify({
            messages: {
                default: 'Glissez-déposez un fichier ici ou cliquez',
                replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                remove: 'Supprimer',
                error: 'Désolé, le fichier trop volumineux'
            }
        });

        // Used events
        var drEvent = $('#input-file-events').dropify();

        drEvent.on('dropify.beforeClear', function(event, element) {
            return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
        });

        drEvent.on('dropify.afterClear', function(event, element) {
            alert('File deleted');
        });

        drEvent.on('dropify.errors', function(event, element) {
            console.log('Has Errors');
        });

        var drDestroy = $('#input-file-to-destroy').dropify();
        drDestroy = drDestroy.data('dropify')
        $('#toggleDropify').on('click', function(e) {
            e.preventDefault();
            if (drDestroy.isDropified()) {
                drDestroy.destroy();
            } else {
                drDestroy.init();
            }
        })
    });
    </script>
</body>
</html>
