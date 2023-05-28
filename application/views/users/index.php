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

        <!--------------------------
        | Your Page Content Here |
        -------------------------->

        <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="<?= base_url('assets/img/' . $users['image']); ?>" class="img-fluid rounded-start" alt="">
                </div>
                <div class="col-md-12">
                    <div class="card-body">
                        <h3 class="card-title"><?= $users['username']; ?></h3>
                        <p class="card-text"><?= $users['email']; ?></p>
                        <p class="card-text"><small class="text-muted">Member since, <?= date('d F Y', $users['date_create']);  ?></small></p>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
