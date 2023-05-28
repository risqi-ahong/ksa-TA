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
                                <?php foreach ($role_id as $rid) : ?>
                                    <?php foreach ($selected as $s) : ?>
                                        <?php foreach ($selected_menu as $sm) : ?>
                                            <div class="mt-3">

                                                <input type="hidden" name="id" value="<?= $rid['id']; ?>">
                                                <label>ROLE USERS</label>
                                                <select class="form-control select2" style="width: 100%;" name="role">
                                                    <option selected="selected" value="<?= $rid['role_id']; ?>"><?= $s['role_id']; ?></option>
                                                    <?php foreach ($role as $r) : ?>
                                                        <option value="<?= $r['id']; ?>"><?= $r['role_id']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>

                                                <label>MENU</label>
                                                <select class="form-control select2" style="width: 100%;" name="menu">
                                                    <option selected="selected" value="<?= $rid['menu_id']; ?>"><?= $sm['menu']; ?></option>
                                                    <?php foreach ($menu as $m) : ?>
                                                        <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>

                                            </div>
                                            <a href="<?= base_url('usersManagement'); ?>" class="btn btn-primary" style="float: left; margin: 5pt;"><i></i>USERS</a>
                                            <button type="submit" class="btn btn-success" style="float: right; margin: 5pt;">Update</button>
                            </form>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                <?php endforeach; ?>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->

        </section>
        <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script>
    function myFunction() {
        var x = document.getElementById("inputPassword");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>