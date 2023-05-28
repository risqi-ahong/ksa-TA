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

        <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

        <?= $this->session->flashdata('massage'); ?>

        <section class="content">
            <div class="row">
                <div class="col-xs-5">
                    <div class="box">
                        <!-- /.box-header -->
                        <div class="box-body">
                            <form action="" method="POST">
                                <?php foreach ($menu as $m) : ?>
                                    <div class="mt-3">
                                        <input type="hidden" name="id" value="<?= $m['id']; ?>">
                                        <label for="exampleFormControlInput1" class="form-label">Menu</label>
                                        <input type="text" name="menu" class="form-control" id="exampleFormControlInput1" value="<?= $m['menu']; ?>">
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