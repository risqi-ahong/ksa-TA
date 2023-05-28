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
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="input-group">
                                                <label for="exampleFormControlInput1" class="form-label">ITEM A</label>
                                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Input Item A" name="item_a">
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="input-group">
                                                <label for="exampleFormControlInput1" class="form-label">QTY A</label>
                                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="QTY A" name="qty_a">
                                            </div>
                                            <!-- /input-group -->
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="input-group">

                                                <label for="exampleFormControlInput1" class="form-label">ITEM B</label>
                                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Input Item B" name="item_b">
                                            </div>
                                            <!-- /input-group -->
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="input-group">

                                                <label for="exampleFormControlInput1" class="form-label">QTY B</label>
                                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="QTY B" name="qty_b">
                                            </div>
                                            <!-- /input-group -->
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="input-group">

                                                <label for="exampleFormControlInput1" class="form-label">ITEM C</label>
                                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Input Item C" name="item_c">
                                            </div>
                                            <!-- /input-group -->
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="input-group">

                                                <label for="exampleFormControlInput1" class="form-label">QTY C</label>
                                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="QTY C" name="qty_c">
                                            </div>
                                            <!-- /input-group -->
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="input-group">

                                                <label for="exampleFormControlInput1" class="form-label">ITEM D</label>
                                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Input Item D" name="item_d">
                                            </div>
                                            <!-- /input-group -->
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="input-group">
                                                <label for="exampleFormControlInput1" class="form-label">QTY D</label>

                                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="QTY D" name="qty_d">
                                            </div>
                                            <!-- /input-group -->
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="input-group">

                                                <label for="exampleFormControlInput1" class="form-label">ITEM E</label>
                                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Input Item E" name="item_e">
                                            </div>
                                            <!-- /input-group -->
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="input-group">

                                                <label for="exampleFormControlInput1" class="form-label">QTY E</label>
                                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="QTY E" name="qty_e">
                                            </div>
                                            <!-- /input-group -->
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="input-group">

                                                <label for="exampleFormControlInput1" class="form-label">ITEM F</label>
                                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Input Item F" name="item_f">
                                            </div>
                                            <!-- /input-group -->
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="input-group">

                                                <label for="exampleFormControlInput1" class="form-label">QTY F</label>
                                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="QTY F" name="qty_f">
                                            </div>
                                            <!-- /input-group -->
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="input-group">

                                                <label for="exampleFormControlInput1" class="form-label">ITEM G</label>
                                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Input Item G" name="item_g">
                                            </div>
                                            <!-- /input-group -->
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="input-group">

                                                <label for="exampleFormControlInput1" class="form-label">QTY G</label>
                                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="QTY G" name="qty_g">
                                            </div>
                                            <!-- /input-group -->
                                        </div>
                                    </div>
                                    <!-- /.col-lg-6 -->
                                </div>
                                <!-- /.row -->
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