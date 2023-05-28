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

        <?= form_error('userAccessMenu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

        <?= $this->session->flashdata('massage'); ?>

        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <a href="<?= base_url('userAccessMenu/add'); ?>" class="btn btn-primary">Add New Access</a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>ROLE USERS</th>
                                        <th>MENU ACCESS</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($userRole as $ur) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td>
                                                <?= $ur['role_id']; ?>
                                            </td>
                                            <td>
                                                <?= $ur['menu']; ?>
                                            </td>
                                            <td>
                                                <a href="<?= base_url("userAccessMenu/update/"); ?><?= $ur['id']; ?>" class="btn btn-success">UPDATE</a>
                                                <a href="<?= base_url("userAccessMenu/delete/"); ?><?= $ur['id']; ?>" class="btn btn-danger" onclick="return confirm('DELETE USERS?');">DELETE</a>
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