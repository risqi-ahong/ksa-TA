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
                                <?php foreach ($stok_out as $out) : ?>
                                    <div class="mt-3">
                                        <input type="hidden" name="id" value="<?= $out['id']; ?>">

                                        <label>KODE</label>
                                        <select class="form-control select2" style="width: 100%;" name="id_barang" disabled="disabled">
                                            <?php foreach ($kode as $k) : ?>
                                                <option selected="selected"><?= $k; ?></option>
                                            <?php endforeach; ?>
                                        </select>

                                        <input type="hidden" name="id_barang" class="form-control" id="exampleFormControlInput1" value="<?= $out['id_barang']; ?>">

                                        <label for="exampleFormControlInput1" class="form-label">QTY</label>
                                        <input type="text" name="qty" class="form-control" id="exampleFormControlInput1" value="<?= $out['qty']; ?>">

                                        <label for="exampleFormControlInput1" class="form-label">DETAILS</label>
                                        <input type="text" name="detail" class="form-control" id="exampleFormControlInput1" value="<?= $out['detail']; ?>">
                                    </div>
                                    <a href="<?= base_url('transaksi_out'); ?>" class="btn btn-primary" style="float: left; margin: 5pt;"><i></i>Data Transaksi Out</a>
                                    <button type="submit" class="btn btn-success" style="float: right; margin: 5pt;">Update </button>
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