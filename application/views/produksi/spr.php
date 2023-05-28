  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <h1>
              <?= $judul; ?>
          </h1>
      </section>

      <?php foreach ($po as $p) : ?>
          <!-- Main content -->
          <section class="invoice">
              <!-- title row -->
              <div class="row">
                  <div class="col-xs-12">
                      <h2 class="page-header">
                          <i class="fa fa-globe"></i> PT. KREASI SENTOSA ABADI
                          <small class="pull-right">Date: <?= $p['date']; ?></small>
                      </h2>
                  </div>
                  <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row">
                  <div style="float:left;text-align: left; padding: 3px 5px;">
                      <address>
                          jumlah<br>
                          nama barang<br>
                          customer<br>
                      </address>
                  </div>
                  <!-- /.col -->
                  <div style="float:left;text-align: left; padding: 3px 1px;">
                      <address>
                          :<br>
                          :<br>
                          :<br>
                      </address>
                  </div>
                  <!-- /.col -->
                  <div style="float:left;text-align: left; padding: 3px 5px;">
                      <address>
                          <?= $p['qty']; ?><br>
                          <?= $name['name']; ?><br>
                          <?= $p['customer']; ?><br>
                      </address>
                  </div>
                  <!-- /.col -->
                  <div style="float:left;text-align: left; padding: 3px 5px;">
                      <address>
                          PO IN<br>
                          TGL PRODUKSI<br>
                          TGL SELESAI<br>
                      </address>
                  </div>
                  <div style="float:left;text-align: left; padding: 3px 3px;">
                      <address>
                          :<br>
                          :<br>
                          :<br>
                      </address>
                  </div>
                  <div style="float:left;text-align: left; padding: 3px 3px;">
                      <address>
                          <?= $p['date'] ?><br>
                      </address>
                  </div>
              <?php endforeach; ?>
              <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                  <div class="col-xs-12 table-responsive">
                      <table class="table table-striped">
                          <thead>
                              <tr>
                                  <th>NO</th>
                                  <th>BAHAN BAKU</th>
                                  <th>BON BB</th>
                                  <th>qty</th>
                                  <th>SISA BB</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php $no = 1; ?>
                              <?php foreach ($isi as $i) : ?>
                                  <tr>
                                      <td>
                                          <?= $no++; ?>
                                      </td>
                                      <td>
                                          <?= $i['item_a']; ?>
                                      </td>
                                      <td></td>
                                      <td>
                                          <?= $total_a; ?>
                                      </td>
                                      <td></td>
                                  </tr>
                                  <tr>
                                      <td>
                                          <?= $no++; ?>
                                      </td>
                                      <td>
                                          <?= $i['item_b']; ?>
                                      </td>
                                      <td></td>
                                      <td>
                                          <?= $total_b; ?>
                                      </td>
                                      <td></td>
                                  </tr>
                                  <tr>
                                      <td>
                                          <?= $no++; ?>
                                      </td>
                                      <td>
                                          <?= $i['item_c']; ?>
                                      </td>
                                      <td></td>
                                      <td>
                                          <?= $total_c; ?>
                                      </td>
                                      <td></td>
                                  </tr>
                                  <tr>
                                      <td>
                                          <?= $no++; ?>
                                      </td>
                                      <td>
                                          <?= $i['item_d']; ?>
                                      </td>
                                      <td></td>
                                      <td>
                                          <?= $total_d; ?>
                                      </td>
                                      <td></td>
                                  </tr>
                                  <tr>
                                      <td>
                                          <?= $no++; ?>
                                      </td>
                                      <td>
                                          <?= $i['item_e']; ?>
                                      </td>
                                      <td></td>
                                      <td>
                                          <?= $total_e; ?>
                                      </td>
                                      <td></td>
                                  </tr>
                                  <tr>
                                      <td>
                                          <?= $no++; ?>
                                      </td>
                                      <td>
                                          <?= $i['item_f']; ?>
                                      </td>
                                      <td></td>
                                      <td>
                                          <?= $total_f; ?>
                                      </td>
                                      <td></td>
                                  </tr>
                                  <tr>
                                      <td>
                                          <?= $no++; ?>
                                      </td>
                                      <td>
                                          <?= $i['item_g']; ?>
                                      </td>
                                      <td></td>
                                      <td>
                                          <?= $total_g; ?>
                                      </td>
                                      <td></td>
                                  </tr>
                              <?php endforeach; ?>
                          </tbody>
                          <td></td>
                          <td>TOTAL QTY</td>
                          <td></td>
                          <td><?= $total_spr; ?></td>
                          <td></td>
                      </table>
                  </div>
                  <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                  <div class="col-xs-12">
                      <a href="<?= base_url('produksi'); ?>" class="btn btn-primary"><i></i>DATA PO</a>
                      <?php foreach ($po as $p) : ?>
                          <a href="<?= base_url('produksi/print/'); ?><?= $p['id']; ?>" target="_blank" class="btn btn-default pull-right"><i class="fa fa-print"></i> Print</a>
                      <?php endforeach; ?>
                  </div>
              </div>
          </section>
          <!-- /.content -->
          <div class="clearfix"></div>
  </div>
  <!-- /.content-wrapper -->