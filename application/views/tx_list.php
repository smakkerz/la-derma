
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div>
                <div class='box-header'>
                <h3 class='box-title'>List Transaksi</h3>
                <table class="table table-bordered table-striped" id="mytable">
                    <tr>
                        <th>ID Transaksi</th>
                        <th>Tanggal</th>
                        <th>Nama Dokter</th>
                        <th>Nama Pasien</th>
                        <th>Status</th>
                    </tr>
                    <?php
                        foreach ($list as $row) {
                    ?>
                    <tr>
                        <td><a href="<?= base_url('c_kasir/p/'.$row->idTransaksi) ?>"><?= $row->idTransaksi ?></a></td>
                        <td><?= format_tanggal($row->date) ?></td>
                        <td><?= $row->idDokter ?></td>
                        <td><?= $row->idPasien ?></td>
                        <td><?= $row->status ?></td>
                    </tr>
                    <?php
                        }
                    ?>
                </table>
<script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#mytable").dataTable();
            });
        </script>
        </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->

