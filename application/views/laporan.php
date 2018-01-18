        <!-- Main content -->
        <div id="contentWrapper" style="display: block;">
        <section id='content' style="display: block;">
          <div class='row'>
            <div class='col-xs-12'>
              <div class="box">
                <div class='box-header'>
                    <h3 class='box-title'>Laporan</h3>
                </div>
                <div class="box-body">
                    <?php
                            $url = $this->uri->segment(1);
                        ?>
                        <?php echo form_open($url."/priode") ?>
                        <?= $tgl ?>
                        <?= form_close() ?>
                        
                        <tr>
                            <th colspan="5">Laporan <?= $kapan ?></th>
                        </tr>
                    <?= $cetak ?>
                    <table class="list-data" width="100%" id="myreport">
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
                </div>
            </div>
        </div>
        <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#myreport").dataTable();
            });
        </script>
    </section>
</div>
