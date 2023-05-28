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

        <?= form_error('subMenu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

        <?= $this->session->flashdata('massage'); ?>

        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <a href="<?= base_url("subMenu/addSubMenu") ?>" class="btn btn-primary">Add New Sub Menu</a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>MENU</th>
                                        <th>SUB MENU</th>
                                        <th>URL</th>
                                        <th>ICON</th>
                                        <th>AKTIVASI</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($subMenu as $sm) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td>
                                                <?= $sm['menu']; ?>
                                            </td>
                                            <td>
                                                <?= $sm['judul']; ?>
                                            </td>
                                            <td>
                                                <?= $sm['url']; ?>
                                            </td>
                                            <td>
                                                <?= $sm['icon']; ?>
                                            </td>
                                            <td>
                                                <?php if ($sm['is_active'] > 0) : ?>
                                                    <input class="form-check-input" type="checkbox" checked> Actived
                                                <?php else : ?>
                                                    <input class="form-check-input" type="checkbox"> No Actived
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <a href="<?= base_url("subMenu/editSubMenu/"); ?><?= $sm['id']; ?>" class="btn btn-success">edit</a>
                                                <a href="<?= base_url('subMenu/deleteSubMenu/'); ?><?= $sm['id']; ?>" class="btn btn-danger" onclick="return confirm('DELETE MENU?');">DELETE</a>
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