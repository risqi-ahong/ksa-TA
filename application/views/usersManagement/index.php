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
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>USER NAME</th>
                                        <th>EMAIL</th>
                                        <th>ROLE USERS</th>
                                        <th>IS ACTIVE</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($user as $u) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td>
                                                <?= $u['username']; ?>
                                            </td>
                                            <td>
                                                <?= $u['email']; ?>
                                            </td>
                                            <td>
                                                <?= $u['role_id']; ?>
                                            </td>
                                            <td>
                                                <?php if ($u['is_active'] > 0) : ?>
                                                    <input class="form-check-input" type="checkbox" checked> Actived
                                                <?php else : ?>
                                                    <input class="form-check-input" type="checkbox"> No Actived
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <a href="<?= base_url("usersManagement/update/"); ?><?= $u['id']; ?>" class="btn btn-success">UPDATE</a>
                                                <a href="<?= base_url("usersManagement/delete/"); ?><?= $u['id']; ?>" class="btn btn-danger" onclick="return confirm('DELETE USERS?');">DELETE</a>
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