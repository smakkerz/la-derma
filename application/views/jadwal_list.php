
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>JADWAL VIEW <?php echo anchor('C_Jadwal/create/','Create',array('class'=>'btn btn-primary btn-sm'));?>
		<?php echo anchor(site_url('C_Jadwal/excel'), ' <i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-primary btn-sm"'); ?></h3>
                </div><!-- /.box-header -->
                <div class='box-body'>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px" style="color: white;">No</th>
		    <th style="color: white;">Nama Dokter</th>
		    <th style="color: white;">Hari</th>
		    <th style="color: white;">DariJam</th>
		    <th style="color: white;">SampaiJam</th>
		    <th style="color: white;">Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($c_jadwal_data as $C_Jadwal)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td>Dr.<?php echo $C_Jadwal->last_name ?></td>
		    <td><?php echo $C_Jadwal->Hari ?>, <?php echo $C_Jadwal->tanggal ?></td>
		    <td><?php echo $C_Jadwal->DariJam ?></td>
		    <td><?php echo $C_Jadwal->SampaiJam ?></td>
		    <td style="text-align:center" width="140px">
			<?php 
			echo anchor(site_url('C_Jadwal/update/'.$C_Jadwal->idJadwal),'Ubah',array('title'=>'edit','class'=>'button button-primary')); 
			echo anchor(site_url('C_Jadwal/delete/'.$C_Jadwal->idJadwal),'Hapus','title="delete" class="button button-primary" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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