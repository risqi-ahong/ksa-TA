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

        <?= form_error('bigWarehouse', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

        <?= $this->session->flashdata('massage'); ?>

        <section class="content">
            <div class="col-xs-12">
                <div class="box">
                <div class="box-header">
                        <a href="<?= base_url('retailWarehouse/addBarang'); ?>" class="btn btn-primary">Add New Stok</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>KODE</th>
                                    <th>NAME</th>
                                    <th>UNIT</th>
                                    <th>STOK</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($stok as $s) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td>
                                            <?= $s['kode_barang']; ?>
                                        </td>
                                        <td>
                                            <?= $s['nama_barang']; ?>
                                        </td>
                                        <td>
                                            <?= $s['satuan']; ?>
                                        </td>
                                        <td>
                                            <?= $s['stok_barang']; ?>
                                        </td>
                                        <td>
                                            <a href="<?= base_url('retailWarehouse/editBarang/'); ?><?= $s['id']; ?>" class="btn btn-success">UPDATE</a>
                                            <a href="<?= base_url('retailWarehouse/deleteBarang/'); ?><?= $s['id']; ?>" class="btn btn-danger" onclick="return confirm('DELETE STOK?');">DELETE</a>
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
        $("#example2").DataTable();
    })
</script>