
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class=''>
                <div class=''>
                  <h3 class='box-title'>Hutang </h3>
                  <?php echo anchor('Hutang/create/','Tambah',array('class'=>'button primary'));?>
                </div><!-- /.box-header -->
                <div class='box-body'>
                    <?= form_open('Hutang/proses') ?>
                <table class="table bordered">
                    <tr>
                        <td>Tanggal</td>
                        <td>:</td>
                        <td><input type="date" name="tanggal" value="<?php echo date('Y-m-d') ?>"></td>
                    </tr>
                    <tr>
                        <td>Jumlah Hutang (Rp.)</td>
                        <td>:</td>
                        <td><input type="number" name="hutang"></td>
                    </tr>
                    <tr>
                        <td>Keterangan</td>
                        <td>:</td>
                        <td><textarea name="keterangan"></textarea></td>
                    </tr>
                    <tr>
                        <td colspan="3"><input type="submit" value="Tambah"></td>
                    </tr>
                </table>
                <?= form_close() ?>
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