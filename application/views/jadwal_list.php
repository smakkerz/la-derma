
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>JADWAL VIEW <?php echo anchor('c_jadwal/create/','Create',array('class'=>'btn btn-primary btn-sm'));?>
		<?php echo anchor(site_url('c_jadwal/excel'), ' <i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-primary btn-sm"'); ?></h3>
                </div><!-- /.box-header -->
                <div class='box-body'>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>Nama Dokter</th>
		    <th>Hari</th>
		    <th>DariJam</th>
		    <th>SampaiJam</th>
		    <th>Action</th>
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
		    <td>Dr.<?php echo $c_jadwal->last_name ?></td>
		    <td><?php echo $c_jadwal->Hari ?></td>
		    <td><?php echo $c_jadwal->DariJam ?></td>
		    <td><?php echo $c_jadwal->SampaiJam ?></td>
		    <td style="text-align:center" width="140px">
			<?php 
			echo anchor(site_url('c_jadwal/update/'.$c_jadwal->idJadwal),'Ubah',array('title'=>'edit','class'=>'button button-primary')); 
			echo anchor(site_url('c_jadwal/delete/'.$c_jadwal->idJadwal),'Hapus','title="delete" class="button button-primary" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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