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

        <?= form_error('produksi', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

        <?= $this->session->flashdata('massage'); ?>

        <section class="content">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <a href="<?= base_url('produksi/add'); ?>" class="btn btn-primary">Add New PO</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>NAME COLOR</th>
                                    <th>CUSTOMER</th>
                                    <th>QTY</th>
                                    <th>DATE CREATE</th>
                                    <th>ACTION</th>
                                </tr>
                            <tbody>
                                </thead>
                                <?php $no = 1; ?>
                                <?php foreach ($po as $p) : ?>
                                    <tr>
                                        <td><?= $no++; ?>
                                        </td>
                                        <td>
                                            <?= $p['name']; ?>
                                        </td>
                                        <td>
                                            <?= $p['customer']; ?>
                                        </td>
                                        <td>
                                            <?= $p['qty']; ?>
                                        </td>
                                        <td>
                                            <?= $p['date']; ?>
                                        </td>
                                        <td>
                                            <a href="<?= base_url('produksi/edit/'); ?><?= $p['id']; ?>" class="btn btn-success">EDIT</a>
                                            <a href="<?= base_url('produksi/delete/'); ?><?= $p['id']; ?>" class="btn btn-danger" onclick="return confirm('DELETE PO');">DELETE</a>
                                            <a href="<?= base_url('produksi/detail/'); ?><?= $p['id']; ?>" class="btn btn-info">DETAIL</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>

        </section>
        <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script>
    $(function() {
        $('#example1').DataTable()
        $('#example2').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': false,
            'ordering': true,
            'info': true,
            'autoWidth': false
        })
    })
</script>