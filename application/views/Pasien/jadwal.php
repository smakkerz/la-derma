
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
                  <h3 class='box-title'>Jadwal VIEW</h3>
                </div><!-- /.box-header -->
                <div class='box-body'>
        <table class="table table-bordered table-striped" id="mytable" bgcolor="white">
            <thead>
                <tr>
            <th width="80px">No</th>
        <th>Hari, Tanggal</th>
        <th>Dari Jam</th>
        <th>Hingga Jam</th>
        <th>Nama Dokter</th>
                </tr>
            </thead>
      <tbody>
            <?php
            $start = 0;
            foreach ($jadwal as $jw)
            {
                ?>
                <tr>
        <td><?php echo ++$start ?></td>
        <td><?php 
        $date = date_create($jw->tanggal);
            echo date_format($date, 'l jS F Y'); 
         ?></td>
        <td><?php echo $jw->DariJam ?> WIB</td>
            <td><?php echo $jw->SampaiJam ?> WIB</td>
        <td><?php echo $jw->first_name." ".$jw->last_name;
         ?></td>
      
          </tr>
                <?php
            }
            ?>
            </tbody>
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