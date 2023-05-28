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

        <?= $this->session->flashdata('massage'); ?>

        <section class="content">
            <div class="row">
                <div class="col-xs-5">
                    <?php if (validation_errors()) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= validation_errors(); ?>
                        </div>
                    <?php endif; ?>
                    <div class="box">
                        <!-- /.box-header -->
                        <div class="box-body">
                            <form action="" method="POST">
                                <div class="mt-3">

                                    <label for="exampleFormControlInput1" class="form-label">Name Color</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Input Name Color" name="name">

                                    <label for="exampleFormControlInput1" class="form-label">Customer</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Input Customer" name="customer">

                                    <a href="<?= base_url('formula'); ?>" class="btn btn-primary" style="float: left; margin: 5pt;"><i></i>Data Formulasi</a>
                                    <button type="submit" class="btn btn-success" style="float: right; margin: 5pt;">Add</button>
                            </form>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->

        </section>
        <!-- /.content -->
</div>
<!-- /.content-wrapper -->