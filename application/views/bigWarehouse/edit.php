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
                                <?php foreach ($stok as $s) : ?>
                                    <div class="mt-3">
                                        <input type="hidden" name="id" value="<?= $s['id']; ?>">
                                        <label for="exampleFormControlInput1" class="form-label">KODE</label>
                                        <input type="text" name="kode_barang" class="form-control" id="exampleFormControlInput1" value="<?= $s['kode_barang']; ?>">

                                        <label for="exampleFormControlInput1" class="form-label">NAME</label>
                                        <input type="text" name="nama_barang" class="form-control" id="exampleFormControlInput1" value="<?= $s['nama_barang']; ?>">

                                        <label for="exampleFormControlInput1" class="form-label">PACK</label>
                                        <input type="text" name="pack" class="form-control" id="exampleFormControlInput1" value="<?= $s['kemasan']; ?>">

                                        <label for="exampleFormControlInput1" class="form-label">UNIT</label>
                                        <input type="text" name="unit" class="form-control" id="exampleFormControlInput1" value="<?= $s['satuan']; ?>">

                                        <label for="exampleFormControlInput1" class="form-label">STOK</label>
                                        <input type="text" name="stok_barang" class="form-control" id="exampleFormControlInput1" value="<?= $s['stok_barang']; ?>">
                                    </div>
                                    <a href="<?= base_url('bigWarehouse'); ?>" class="btn btn-primary" style="float: left; margin: 5pt;"><i></i>Data Warehouse</a>
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