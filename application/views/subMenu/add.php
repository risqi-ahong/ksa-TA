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
                            <form action="<?= base_url('SubMenu/addSubMenu') ?>" method="POST">
                                <div class="mt-3">
                                    <label for="exampleFormControlInput1" class="form-label">MENU</label>
                                    <select class="form-control" aria-label="Default select example" name="menu_id">
                                        <option selected>Open this select title</option>
                                        <?php foreach ($menu as $m) : ?>
                                            <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                                        <?php endforeach; ?>
                                    </select>

                                    <label for="exampleFormControlInput1" class="form-label">SUB MENU</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Input New Sub Menu" name="judul">

                                    <label for="exampleFormControlInput1" class="form-label">URL</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Input New URL" name="url">

                                    <label for="exampleFormControlInput1" class="form-label">ICON</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Input New Icon" name="icon">
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="is_active" type="checkbox" value="1" id="is_active" checked>
                                    <label class="form-check-label" for="is_active">
                                        ACTIVE?
                                    </label>
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