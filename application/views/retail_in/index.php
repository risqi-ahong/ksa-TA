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

        <?= form_error('transaksi_in', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

        <?= $this->session->flashdata('massage'); ?>

        <section class="content">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <a href="<?= base_url('retail_in/add_in'); ?>" class="btn btn-primary">Add In Item</a>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="transaksi_in" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>KODE</th>
                                    <th>UNIT</th>
                                    <th>QTY</th>
                                    <th>DETAILS</th>
                                    <th>DATE</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($in_item as $in) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td>
                                            <?= $in['kode_barang']; ?>
                                        </td>
                                        <td>
                                            <?= $in['satuan']; ?>
                                        </td>
                                        <td>
                                            <?= $in['qty']; ?>
                                        </td>
                                        <td>
                                            <?= $in['detail']; ?>
                                        </td>
                                        <td>
                                            <?= $in['date']; ?>
                                        </td>
                                        <td>
                                            <a href="<?= base_url('retail_in/edit_in/'); ?><?= $in['id']; ?>" class="btn btn-success">UPDATE</a>
                                            <a href="<?= base_url('retail_in/delete_in/'); ?><?= $in['id']; ?>" class="btn btn-danger" onclick="return confirm('DELETE STOK?');">DELETE</a>
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
        $("#transaksi_in").DataTable();
    })
</script>