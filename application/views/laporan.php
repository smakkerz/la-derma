        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div>
                <div class='box-header'>
                <h3 class='box-title'>Laporan</h3>
                <table class="table bordered hovered striped" width="100%">
                    <?= form_open('Laporan_pemasukan/priode') ?>
                    <?= $tgl ?>
                    <?= form_close() ?>
                    <?= $cetak ?>
                    <tr>
                        <th colspan="5">Laporan Pemasukan <?= $kapan ?></th>
                    </tr>
                    <tr>
                        <th>ID Transaksi</th>
                        <th>Tanggal Transaksi</th>
                        <th>Operator</th>
                        <th>Uang Masuk</th>
                        <th>Keterangan</th>
                    </tr>
                        <?php 
                            foreach ($pemasukan as $data) {
                        ?>
                        <tr>
                        <td><?= $data->idtransaksi ?></td>
                        <td><?= $data->waktu ?></td>
                        <td><?= $data->IdPengguna ?></td>
                        <td><?= $data->masuk ?></td>
                        <td><?= $data->keterangan ?></td>
                        </tr>
                        <?php
                            }
                        ?>
                    
                </table>
            </div>
        </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->

