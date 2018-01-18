    <div id="contentWrapper" style="display: block;">
        <section id='content' style="display: block;">
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>JADWAL DOKTER
                   <?php echo anchor('C_Jadwal/create/','Create',array('class'=>'button primary btn-sm'));?></h3>
                </div><!-- /.box-header -->
                <div class='box-body'>
        <table class="list-data" width="100%" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>Nama Dokter</th>
		    <th>Hari</th>
		    <th>Mulai Jam</th>
		    <th>Selesai Jam</th>
		    <th>Action</th>
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
		    <td><?php echo $C_Jadwal->DariJam ?> WIB</td>
		    <td><?php echo $C_Jadwal->SampaiJam ?> WIB</td>
		    <td style="text-align:center" width="140px">
			<?php 
			echo anchor(site_url('C_Jadwal/update/'.$C_Jadwal->idJadwal),'<i class="fa fa-pencil"></i>',array('title'=>'edit','class'=>'button primary')); 
            echo ' ';
			echo anchor(site_url('C_Jadwal/delete/'.$C_Jadwal->idJadwal),'<i class="fa fa-trash-o"></i>','title="delete" class="button danger" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
    </div>