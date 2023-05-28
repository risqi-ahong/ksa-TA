<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= $judul; ?>
        </h1>

    </section>
    <!-- Main content -->
    <section clz`ass="content">
        <div class="col-md-5">
            <div class="box">
                <div class="box-header with-border">
                    <?php foreach ($formulasi as $f) : ?>
                        <h3 class="box-title"><?= $f['name']; ?></h3>
                    <?php endforeach; ?>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 10px">NO</th>
                                <th>BAHAN BAKU</th>
                                <th style="width: 90px">prosentase</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($formulasi_isi as $fi) : ?>
                                <tr>
                                    <td>
                                        <?= $no++; ?>
                                    </td>
                                    <td>
                                        <?= $fi['item_a']; ?>
                                    </td>
                                    <td>
                                        <?= $fi['qty_a']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <?= $no++; ?>
                                    </td>
                                    <td>
                                        <?= $fi['item_b']; ?>
                                    </td>
                                    <td>
                                        <?= $fi['qty_b']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <?= $no++; ?>
                                    </td>
                                    <td>
                                        <?= $fi['item_c']; ?>
                                    </td>
                                    <td>
                                        <?= $fi['qty_c']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <?= $no++; ?>
                                    </td>
                                    <td>
                                        <?= $fi['item_d']; ?>
                                    </td>
                                    <td>
                                        <?= $fi['qty_d']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <?= $no++; ?>
                                    </td>
                                    <td>
                                        <?= $fi['item_e']; ?>
                                    </td>
                                    <td>
                                        <?= $fi['qty_e']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <?= $no++; ?>
                                    </td>
                                    <td>
                                        <?= $fi['item_f']; ?>
                                    </td>
                                    <td>
                                        <?= $fi['qty_f']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <?= $no++; ?>
                                    </td>
                                    <td>
                                        <?= $fi['item_g']; ?>
                                    </td>
                                    <td>
                                        <?= $fi['qty_g']; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <?php foreach ($formulasi_isi as $fi) : ?>
                            <tr>
                                <td></td>
                                <td>Total Prosentase</td>
                                <td><?= $fi['total']; ?></td>
                            </tr>
                    </table>
                    <td>
                        <a href="<?= base_url('formula'); ?>" class="btn btn-primary" style="float: left; margin: 5pt;"><i></i>Data Formulasi</a>
                        <a style="float: right; margin: 5pt;" href="<?= base_url('formula/delete_isi/'); ?><?= $fi['id']; ?>" class="btn btn-danger" onclick="return confirm('DELETE FORMULASI');">DELETE</a>
                        <a style="float: right; margin: 5pt;" href="<?= base_url('formula/edit_isi/'); ?><?= $fi['id']; ?>" class="btn btn-success">EDIT</a>
                    </td>
                <?php endforeach; ?>
                </div>
                <!-- /.box-body -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->