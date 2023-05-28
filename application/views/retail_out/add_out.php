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
                            <form action="<?= base_url('transaksi_out/add_out') ?>" method="POST">
                                <div class="mt-3">

                                    <label for="exampleFormControlInput1" class="form-label">KODE</label>
                                    <select class="form-control" aria-label="Default select example" name="id_barang">
                                        <option selected>Open this select kode</option>
                                        <?php foreach ($kd_barang as $barang) : ?>
                                            <option value="<?= $barang['id']; ?>"><?= $barang['kode_barang']; ?></option>
                                        <?php endforeach; ?>
                                    </select>

                                    <label for="exampleFormControlInput1" class="form-label">UNIT</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Input Satuan" name="satuan">

                                    <label for="exampleFormControlInput1" class="form-label">QTY</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Input QTY" name="qty">

                                    <label for="exampleFormControlInput1" class="form-label">DETAILS</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Input Detail" name="detail">
                                </div>
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