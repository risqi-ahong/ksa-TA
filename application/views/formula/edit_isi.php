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
                                <?php foreach ($formula_isi as $fi) : ?>
                                    <div class="mt-3">
                                        <input type="hidden" name="id" value="<?= $fi['id']; ?>">

                                        <input type="hidden" name="id_name" class="form-control" id="exampleFormControlInput1" value="<?= $fi['id_name']; ?>">

                                        <div class="col-lg-6">
                                            <div class="input-group">
                                                <label for="exampleFormControlInput1" class="form-label">Item A</label>
                                                <input type="text" name="item_a" class="form-control" id="exampleFormControlInput1" value="<?= $fi['item_a']; ?>">
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="input-group">
                                                <label for="exampleFormControlInput1" class="form-label">Qty A</label>
                                                <input type="text" name="qty_a" class="form-control" id="exampleFormControlInput1" value="<?= $fi['qty_a']; ?>">
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="input-group">
                                                <label for="exampleFormControlInput1" class="form-label">Item B</label>
                                                <input type="text" name="item_b" class="form-control" id="exampleFormControlInput1" value="<?= $fi['item_b']; ?>">
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="input-group">
                                                <label for="exampleFormControlInput1" class="form-label">Qty B</label>
                                                <input type="text" name="qty_b" class="form-control" id="exampleFormControlInput1" value="<?= $fi['qty_b']; ?>">
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="input-group">
                                                <label for="exampleFormControlInput1" class="form-label">Item C</label>
                                                <input type="text" name="item_c" class="form-control" id="exampleFormControlInput1" value="<?= $fi['item_c']; ?>">
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="input-group">
                                                <label for="exampleFormControlInput1" class="form-label">Qty C</label>
                                                <input type="text" name="qty_c" class="form-control" id="exampleFormControlInput1" value="<?= $fi['qty_c']; ?>">
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="input-group">
                                                <label for="exampleFormControlInput1" class="form-label">Item D</label>
                                                <input type="text" name="item_d" class="form-control" id="exampleFormControlInput1" value="<?= $fi['item_d']; ?>">
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="input-group">
                                                <label for="exampleFormControlInput1" class="form-label">Qty D</label>
                                                <input type="text" name="qty_d" class="form-control" id="exampleFormControlInput1" value="<?= $fi['qty_d']; ?>">
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="input-group">
                                                <label for="exampleFormControlInput1" class="form-label">Item E</label>
                                                <input type="text" name="item_e" class="form-control" id="exampleFormControlInput1" value="<?= $fi['item_e']; ?>">
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="input-group">
                                                <label for="exampleFormControlInput1" class="form-label">Qty E</label>
                                                <input type="text" name="qty_e" class="form-control" id="exampleFormControlInput1" value="<?= $fi['qty_e']; ?>">
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="input-group">
                                                <label for="exampleFormControlInput1" class="form-label">Item F</label>
                                                <input type="text" name="item_f" class="form-control" id="exampleFormControlInput1" value="<?= $fi['item_f']; ?>">
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="input-group">
                                                <label for="exampleFormControlInput1" class="form-label">Qty F</label>
                                                <input type="text" name="qty_f" class="form-control" id="exampleFormControlInput1" value="<?= $fi['qty_f']; ?>">
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="input-group">
                                                <label for="exampleFormControlInput1" class="form-label">Item G</label>
                                                <input type="text" name="item_g" class="form-control" id="exampleFormControlInput1" value="<?= $fi['item_g']; ?>">
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="input-group">
                                                <label for="exampleFormControlInput1" class="form-label">Qty G</label>
                                                <input type="text" name="qty_g" class="form-control" id="exampleFormControlInput1" value="<?= $fi['qty_g']; ?>">
                                            </div>
                                        </div>

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