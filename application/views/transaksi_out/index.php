<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= $judul; ?>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <?= form_error('transaksi_out', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

        <?= $this->session->flashdata('massage'); ?>

        <section class="content">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <a href="<?= base_url('transaksi_out/add_out'); ?>" class="btn btn-primary">Add Out Item</a>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="transaksi_out" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>KODE</th>
                                    <th>PACK</th>
                                    <th>UNIT</th>
                                    <th>QTY</th>
                                    <th>DETAILS</th>
                                    <th>DATE</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($out_item as $out) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td>
                                            <?= $out['kode_barang']; ?>
                                        </td>
                                        <td>
                                            <?= $out['kemasan']; ?>
                                        </td>
                                        <td>
                                            <?= $out['satuan']; ?>
                                        </td>
                                        <td>
                                            <?= $out['qty']; ?>
                                        </td>
                                        <td>
                                            <?= $out['detail']; ?>
                                        </td>
                                        <td>
                                            <?= $out['date']; ?>
                                        </td>
                                        <td>
                                            <a href="<?= base_url('transaksi_out/edit_out/'); ?><?= $out['id']; ?>" class="btn btn-success">UPDATE</a>
                                            <a href="<?= base_url('transaksi_out/delete_out/'); ?><?= $out['id']; ?>" class="btn btn-danger" onclick="return confirm('DELETE TRANSAKSI OUT?');">DELETE</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

        </section>
        <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script>
    $(document).ready(function() {
        $("#transaksi_out").DataTable();
    })
</script>