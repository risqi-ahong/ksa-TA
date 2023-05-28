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
                                <div class="mt-3">

                                    <label>ROLE USERS</label>
                                    <select class="form-control select2" style="width: 100%;" name="role">
                                        <option selected="selected" value="">Selected Role Users</option>
                                        <?php foreach ($role as $r) : ?>
                                            <option value="<?= $r['id']; ?>"><?= $r['role_id']; ?></option>
                                        <?php endforeach; ?>
                                    </select>

                                    <label>MENU</label>
                                    <select class="form-control select2" style="width: 100%;" name="menu">
                                        <option selected="selected" value="">Selected Menu</option>
                                        <?php foreach ($menu as $m) : ?>
                                            <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                                        <?php endforeach; ?>
                                    </select>

                                </div>
                                <a href="<?= base_url('userAccessMenu'); ?>" class="btn btn-primary" style="float: left; margin: 5pt;"><i></i>USERS ACCESS</a>
                                <button type="submit" class="btn btn-success" style="float: right; margin: 5pt;">ADD</button>
                            </form>
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