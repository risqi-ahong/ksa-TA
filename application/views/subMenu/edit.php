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
                <div class="col-xs-5">
                    <div class="box">
                        <!-- /.box-header -->
                        <div class="box-body">
                            <form action="" method="POST">
                                <?php foreach ($subMenu as $sm) : ?>
                                    <div class="mt-3">
                                        <input type="hidden" name="id" value="<?= $sm['id']; ?>">
                                        <label for="exampleFormControlInput1" class="form-label">Menu</label>
                                        <input type="text" name="menu_id" class="form-control" id="exampleFormControlInput1" value="<?= $sm['menu_id']; ?>">

                                        <label for="exampleFormControlInput1" class="form-label">Judul</label>
                                        <input type="text" name="judul" class="form-control" id="exampleFormControlInput1" value="<?= $sm['judul']; ?>">

                                        <label for="exampleFormControlInput1" class="form-label">Url</label>
                                        <input type="text" name="url" class="form-control" id="exampleFormControlInput1" value="<?= $sm['url']; ?>">

                                        <label for="exampleFormControlInput1" class="form-label">Icon</label>
                                        <input type="text" name="icon" class="form-control" id="exampleFormControlInput1" value="<?= $sm['icon']; ?>">

                                        <div class="form-check">
                                            <input class="form-check-input" name="is_active" type="checkbox" value="1" id="is_active" checked>
                                            <label class="form-check-label" for="is_active">
                                                ACTIVE?
                                            </label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success" style="float: right; margin: 5pt;">Update</button>
                                <?php endforeach; ?>
                            </form>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->

        </section>
        <!-- /.content -->
</div>
<!-- /.content-wrapper -->