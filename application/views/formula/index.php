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

        <?= form_error('formula', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

        <?= $this->session->flashdata('massage'); ?>

        <section class="content">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <a href="<?= base_url('formula/add'); ?>" class="btn btn-primary">Add New Formulasi</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>NAME COLOR</th>
                                    <th>CUSTOMER</th>
                                    <th>DATE CREATE</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($formulasi as $f) : ?>
                                    <tr>
                                        <td><?= $no++; ?>
                                        </td>
                                        <td>
                                            <?= $f['name']; ?>
                                        </td>
                                        <td>
                                            <?= $f['customer']; ?>
                                        </td>
                                        <td>
                                            <?= $f['date_create']; ?>
                                        </td>
                                        <td>
                                            <a href="<?= base_url('formula/edit/'); ?><?= $f['id']; ?>" class="btn btn-success">EDIT</a>
                                            <a href="<?= base_url('formula/delete/'); ?><?= $f['id']; ?>" class="btn btn-danger" onclick="return confirm('DELETE FORMULASI');">DELETE</a>
                                            <a href="<?= base_url('formula/detail/'); ?><?= $f['id']; ?>" class="btn btn-info">DETAIL</a>
                                            <a href="<?= base_url('formula/add_isi/'); ?><?= $f['id']; ?>" class="btn btn-warning">CREATE FORMULASI</a>
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