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
                                <?php foreach ($user as $u) : ?>
                                    <div class="mt-3">

                                        <input type="hidden" name="id" value="<?= $u['id']; ?>">

                                        <label for="exampleFormControlInput1" class="form-label">USERNAME</label>
                                        <input type="text" name="username" class="form-control" id="exampleFormControlInput1" value="<?= $u['username']; ?>">

                                        <label for="exampleFormControlInput1" class="form-label">EMAIL</label>
                                        <input type="email" name="email" class="form-control" id="exampleFormControlInput1" value="<?= $u['email']; ?>">

                                        <label>ROLE USERS</label>
                                        <select class="form-control select2" style="width: 100%;" name="role_id">
                                            <option selected="selected" value="<?= $u['role_id']; ?>"><?= $user_role['role_id']; ?></option>
                                            <?php foreach ($role_id as $ri) : ?>
                                                <option value="<?= $ri['id']; ?>"><?= $ri['role_id']; ?></option>
                                            <?php endforeach; ?>
                                        </select>


                                        <?php if ($u['is_active'] > 0) : ?>
                                            <input class="form-check-input" type="checkbox" name="is_actived" checked> Actived
                                        <?php else : ?>
                                            <input class="form-check-input" type="checkbox" name="is_actived"> No Actived
                                        <?php endif; ?>
                                    </div>
                                    <a href="<?= base_url('usersManagement'); ?>" class="btn btn-primary" style="float: left; margin: 5pt;"><i></i>USERS</a>
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