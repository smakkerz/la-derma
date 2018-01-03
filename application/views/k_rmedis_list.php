
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>Rekam Medis VIEW <?php echo anchor('K_rmedis/create/','Create',array('class'=>'button primary btn-sm'));?>
		<?php echo anchor(site_url('K_rmedis/excel'), ' <i class="fa fa-file-excel-o"></i> Excel', 'class="button primary btn-sm"'); ?>
		<?php echo anchor(site_url('K_rmedis/pdf'), '<i class="fa fa-file-pdf-o"></i> PDF', 'class="button primary btn-sm"'); ?></h3>
                </div><!-- /.box-header -->
                <div class='box-body'>
        <table class="table table-bordered table-striped" id="mytable" bgcolor="white">
            <thead>
                <tr>
            <th width="80px" style="color: white;">No</th>
		    <th style="color: white;">Id Tindakan</th>
		    <th style="color: white;">Id Pasien</th>
            <th style="color: white;">Id Dokter</th>
		    <th style="color: white;">Waktu</th>
		    <th style="color: white;">Id Pengguna</th>
		    <th style="color: white;">Action</th>
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
		    <td><?php echo $k_rmedis->id_pengguna ?></td>
		    
		    <td style="text-align:center" width="140px">
			<?php 
			echo anchor(site_url('K_rmedis/read/'.$k_rmedis->id_rmedis),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-warning btn-sm')); 
			echo '  '; 
			echo anchor(site_url('K_rmedis/update/'.$k_rmedis->id_rmedis),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-success btn-sm')); 
			echo '  '; 
			echo anchor(site_url('K_rmedis/delete/'.$k_rmedis->id_rmedis),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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