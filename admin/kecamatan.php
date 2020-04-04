<!DOCTYPE html>
<html lang="en">
<?php require 'partials/head.php';?>
<title>Kecamatan | SIG - SAY</title>
<body class="skin-default-dark fixed-layout logo-center">
    <!-- <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">SIG-SAY</p>
        </div>
    </div> -->
    <div id="main-wrapper">
        <?php require 'partials/header.php';?>
        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Kecamatan</h4>
                    </div>
                    <!-- php query -->
                    <?php
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
                            return "Data Kategori Desain Kosong";
                        }

                    ?>
                    <!-- php query -->
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Kecamatan</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Kecamatan di Malang</h4>
                                <a href="kecamatan-create.php" 
                                class="btn btn-success d-none float-right d-lg-block m-l-15">
                                    <i class="fa fa-plus-circle"></i>&nbsp; Tambah Data
                                </a>
                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr class="row">
                                                <th class="col-md-1">No.</th>
                                                <th class="col-md-1">Kode Kec.</th>
                                                <th class="col-md-3">Nama</th>
                                                <th class="col-md-2">Latitude</th>
                                                <th class="col-md-2">Longitude</th>
                                                <th class="col-md-3">Option</th>
                                            </tr>
                                        </thead>
                                        <tbody id="show-kecamatan">
                                            <?php foreach ($allKecamatan as $key => $kecamatan) : ?>
                                                <tr class="row">
                                                    <td class="col-md-1"><?php echo ++$key; ?></td>
                                                    <td class="col-md-1"><?php echo $kecamatan['kodekecamatan']; ?></td>
                                                    <td class="col-md-3"><?php echo $kecamatan['kecamatan']; ?></td>
                                                    <td class="col-md-2"><?php echo $kecamatan['latitude']; ?></td>
                                                    <td class="col-md-2"><?php echo $kecamatan['longitude']; ?></td>
                                                    <td class="col-md-3">
                                                        <div class="buttonContainer">
                                                        <a href="kecamatan-edit.php?id=<?php echo $kecamatan['idkecamatan']; ?>" class="btn btn-success buttonInline"><span class="fa fa-edit"></span></a>
                                                        <a href="kecamatan-process.php?id=<?php echo $kecamatan['idkecamatan']; ?>" class="btn btn-danger buttonInline"><span class="fa fa-trash"></span></a>
                                                    </div> 
                                                    </td>
                                                </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php require 'partials/rightSidebar.php'; ?>
            </div>
        </div>
        <footer class="footer">
            © 2018 by SAY
        </footer>
    </div>
    <?php require 'partials/foot.php'; ?>
    <script src="assets/datatables/jquery.dataTables.min.js"></script>
    <!-- start - This is for export functionality only -->
    <!-- <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script> -->
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
            $(document).ready(function() {
                var table = $('#example').DataTable({
                    "columnDefs": [{
                        "visible": false,
                        "targets": 2
                    }],
                    "order": [
                    [2, 'asc']
                    ],
                    "displayLength": 25,
                    "drawCallback": function(settings) {
                        var api = this.api();
                        var rows = api.rows({
                            page: 'current'
                        }).nodes();
                        var last = null;
                        api.column(2, {
                            page: 'current'
                        }).data().each(function(group, i) {
                            if (last !== group) {
                                $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                                last = group;
                            }
                        });
                    }
                });
            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function() {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                } else {
                    table.order([2, 'asc']).draw();
                }
            });
        });
        });
        $('#example23').DataTable({
            dom: 'Bfrtip',
            buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    </script>
</body>

</html>
