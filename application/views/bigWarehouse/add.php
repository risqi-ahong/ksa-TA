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
                            <form action="<?= base_url('bigWarehouse/addBarang') ?>" method="POST">
                                <div class="mt-3">

                                    <label for="exampleFormControlInput1" class="form-label">KODE</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Input New Kode" name="kode_barang">

                                    <label for="exampleFormControlInput1" class="form-label">NAME</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Input New Name" name="nama_barang">

                                    <label for="exampleFormControlInput1" class="form-label">PACK</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Input New Pack" name="pack">

                                    <label for="exampleFormControlInput1" class="form-label">UNIT</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Input New Unit" name="unit">

                                    <label for="exampleFormControlInput1" class="form-label">STOK</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Input New Stok" name="stok_barang">
                                </div>
                                <a href="<?= base_url('bigWarehouse'); ?>" class="btn btn-primary" style="float: left; margin: 5pt;"><i></i>Data Warehouse</a>
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