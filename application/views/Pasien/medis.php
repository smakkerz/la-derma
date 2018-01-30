
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
                  <h3 class='box-title'>Rekam Medis VIEW</h3>
                </div><!-- /.box-header -->
                <div class='box-body'>
        <table class="table table-bordered table-striped" id="mytable" bgcolor="white">
            <thead>
                <tr>
            <th width="80px">No</th>
		    <th>Id Tindakan</th>
		    <th>Id Pasien</th>
            <th>Id Dokter</th>
		    <th>Waktu</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($k_rmedis_data as $k_rmedis)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $k_rmedis->tindakan ?></td>
		    <td><?php echo $k_rmedis->id_pasien ?></td>
            <td><?php echo $k_rmedis->id_dokter ?></td>
		    <td><?php echo $k_rmedis->waktu ?></td>
	    
		    <td style="text-align:center" width="140px">
			<?php 
			echo anchor(site_url('C_pasien/medis_detail/'.$k_rmedis->id_rmedis),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-warning btn-sm')); 
			echo '  '; 
			?>
		    </td>
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