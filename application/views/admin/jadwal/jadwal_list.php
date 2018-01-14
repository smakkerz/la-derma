        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class=''>
                <div class=''>
                  <h3 class='box-title'>Jadwal Praktek Dokter</h3> 
                  <?php echo anchor('C_jadwal/create/','Create',array('class'=>'button primary'));?>
		          <?php echo anchor(site_url('C_jadwal/excel'), ' <i class="fa fa-file-excel-o"></i> Excel', 'class="button warning"'); ?>
		          <?php echo anchor(site_url('C_jadwal/pdf'), '<i class="fa fa-file-pdf-o"></i> PDF', 'class="button warning"'); ?></h3>
                </div><!-- /.box-header -->
                <div class=''>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px"><font color="white">No</font></th>
		            <th><font color="white">IdDokter</font></th>
		            <th><font color="white">Hari</font></th>
		            <th><font color="white">DariJam</font></th>
		            <th><font color="white">SampaiJam</font></th>
		            <th><font color="white">Action</font></th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($c_jadwal_data as $c_jadwal)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $c_jadwal->idDokter ?></td>
		    <td><?php echo $c_jadwal->Hari ?></td>
		    <td><?php echo $c_jadwal->DariJam ?></td>
		    <td><?php echo $c_jadwal->SampaiJam ?></td>
		    <td style="text-align:center" width="140px">
			<?php 
			echo anchor(site_url('c_jadwal/read/'.$c_jadwal->idJadwal),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-warning btn-sm')); 
			echo '  '; 
			echo anchor(site_url('c_jadwal/update/'.$c_jadwal->idJadwal),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-success btn-sm')); 
			echo '  '; 
			echo anchor(site_url('c_jadwal/delete/'.$c_jadwal->idJadwal),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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