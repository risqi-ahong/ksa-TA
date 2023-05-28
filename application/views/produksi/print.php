<body onload="window.print();">
    <div class="wrapper">
        <!-- Main content -->

        <?php foreach ($po as $p) : ?>
            <!-- Main content -->
            <section class="invoice">
                <!-- title row -->
                <div class="row">
                    <div class="col-xs-12">
                        <h2 class="page-header">
                            <i class="fa fa-globe"></i> PT. KREASI SENTOSA ABADI
                            <small class="pull-right">Date: <?= $p['date']; ?></small>
                        </h2>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- info row -->
                <div class="row">
                    <div style="float:left;text-align: left; padding: 3px 5px;">
                        <address>
                            jumlah<br>
                            nama barang<br>
                            customer<br>
                        </address>
                    </div>
                    <!-- /.col -->
                    <div style="float:left;text-align: left; padding: 3px 1px;">
                        <address>
                            :<br>
                            :<br>
                            :<br>
                        </address>
                    </div>
                    <!-- /.col -->
                    <div style="float:left;text-align: left; padding: 3px 5px;">
                        <address>
                            <?= $p['qty']; ?><br>
                            <?= $name['name']; ?><br>
                            <?= $p['customer']; ?><br>
                        </address>
                    </div>
                    <!-- /.col -->
                    <div style="float:left;text-align: left; padding: 3px 5px;">
                        <address>
                            PO IN<br>
                            TGL PRODUKSI<br>
                            TGL SELESAI<br>
                        </address>
                    </div>
                    <div style="float:left;text-align: left; padding: 3px 3px;">
                        <address>
                            :<br>
                            :<br>
                            :<br>
                        </address>
                    </div>
                    <div style="float:left;text-align: left; padding: 3px 3px;">
                        <address>
                            <?= $p['date'] ?><br>
                        </address>
                    </div>
                <?php endforeach; ?>
                <!-- /.col -->
                </div>
                <!-- /.row -->

                <!-- Table row -->
                <div class="row">
                    <div class="col-xs-12 table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>BAHAN BAKU</th>
                                    <th>BON BB</th>
                                    <th>qty</th>
                                    <th>SISA BB</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($isi as $i) : ?>
                                    <tr>
                                        <td>
                                            <?= $no++; ?>
                                        </td>
                                        <td>
                                            <?= $i['item_a']; ?>
                                        </td>
                                        <td></td>
                                        <td>
                                            <?= $total_a; ?>
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?= $no++; ?>
                                        </td>
                                        <td>
                                            <?= $i['item_b']; ?>
                                        </td>
                                        <td></td>
                                        <td>
                                            <?= $total_b; ?>
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?= $no++; ?>
                                        </td>
                                        <td>
                                            <?= $i['item_c']; ?>
                                        </td>
                                        <td></td>
                                        <td>
                                            <?= $total_c; ?>
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?= $no++; ?>
                                        </td>
                                        <td>
                                            <?= $i['item_d']; ?>
                                        </td>
                                        <td></td>
                                        <td>
                                            <?= $total_d; ?>
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?= $no++; ?>
                                        </td>
                                        <td>
                                            <?= $i['item_e']; ?>
                                        </td>
                                        <td></td>
                                        <td>
                                            <?= $total_e; ?>
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?= $no++; ?>
                                        </td>
                                        <td>
                                            <?= $i['item_f']; ?>
                                        </td>
                                        <td></td>
                                        <td>
                                            <?= $total_f; ?>
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?= $no++; ?>
                                        </td>
                                        <td>
                                            <?= $i['item_g']; ?>
                                        </td>
                                        <td></td>
                                        <td>
                                            <?= $total_g; ?>
                                        </td>
                                        <td></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <td></td>
                            <td>TOTAL QTY</td>
                            <td></td>
                            <td><?= $total_spr; ?></td>
                            <td></td>
                        </table>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <!-- this row will not appear when printing -->
                <div class="row no-print">
                    <div class="col-xs-12">
                        <?php foreach ($po as $p) : ?>
                            <a href="<?= base_url('produksi/print/'); ?><?= $p['id']; ?>" target="_blank" class="btn btn-default pull-right"><i class="fa fa-print"></i> Print</a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>
            <!-- /.content -->
            <div class="clearfix"></div>
    </div>
    <!-- /.content-wrapper -->
    <!-- jQuery 3 -->
    <script src="<?= base_url('assets/admin/') ?>bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?= base_url('assets/admin/') ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="<?= base_url('assets/admin/') ?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('assets/admin/') ?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="<?= base_url('assets/admin/') ?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?= base_url('assets/admin/') ?>bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('assets/admin/') ?>dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= base_url('assets/admin/') ?>dist/js/demo.js"></script>
    <!-- page script -->
    <script type="text/javascript">
        window.print();
    </script>
</body>