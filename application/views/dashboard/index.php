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

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?= $jumlah_users; ?></h3>

              <p>User</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="<?= base_url('usersManagement'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-orange">
            <div class="inner">
              <h3><?= $stok; ?></h3>

              <p>Stok</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="<?= base_url('bigWarehouse'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
          <!-- ./col -->
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?= $po; ?></h3>
              <p>New purchase order</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="<?= base_url('produksi') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?= $formulasi; ?><sup style="font-size: 20px"></sup></h3>

              <p>Formulasi</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?= base_url('formula'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?= $transaksi_masuk; ?></h3>

              <p>Transaksi In</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="<?= base_url('transaksi_in'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
          <!-- ./col -->
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?= $transaksi_keluar; ?></h3>

              <p>Transaksi Out</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="<?= base_url('transaksi_out'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->