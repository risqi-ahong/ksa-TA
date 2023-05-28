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
                                <?php foreach ($formula as $f) : ?>
                                    <div class="mt-3">
                                        <input type="hidden" name="id" value="<?= $f['id']; ?>">
                                        <label for="exampleFormControlInput1" class="form-label">Name Color</label>
                                        <input type="text" name="name" class="form-control" id="exampleFormControlInput1" value="<?= $f['name']; ?>">

                                        <label for="exampleFormControlInput1" class="form-label">Customer</label>
                                        <input type="text" name="customer" class="form-control" id="exampleFormControlInput1" value="<?= $f['customer']; ?>">

                                        <a href="<?= base_url('formula'); ?>" class="btn btn-primary" style="float: left; margin: 5pt;"><i></i>Data Formulasi</a>
                                        <button type="submit" class="btn btn-success" style="float: right; margin: 5pt;">EDIT</button>
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