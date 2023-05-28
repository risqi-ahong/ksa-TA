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
                                <?php foreach ($po as $p) : ?>
                                    <div class="mt-3">
                                        <input type="hidden" name="id" value="<?= $p['id']; ?>">
                                        <input type="hidden" name="id_formulasi" value="<?= $p['id_formulasi']; ?>">
                                        <label>Name Color</label>
                                        <select class="form-control select2" style="width: 100%;" name="name" disabled="disabled">
                                            <option selected="selected"><?= $name['name']; ?></option>
                                        </select>

                                        <label for="exampleFormControlInput1" class="form-label">Customer</label>
                                        <input type="text" name="customer" class="form-control" id="exampleFormControlInput1" value="<?= $p['customer']; ?>">

                                        <label for="exampleFormControlInput1" class="form-label">Qty</label>
                                        <input type="text" name="qty" class="form-control" id="exampleFormControlInput1" value="<?= $p['qty']; ?>">

                                        <a href="<?= base_url('produksi'); ?>" class="btn btn-primary" style="float: left; margin: 5pt;"><i></i>DATA PO</a>
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