
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>DATA ARUS KAS <?php echo anchor('arus_kas/create/','Create',array('class'=>'button primary btn-sm'));?>
		<?php echo anchor(site_url('arus_kas/excel'), ' <i class="fa fa-file-excel-o"></i> Excel', 'class="button primary btn-sm"'); ?>
		<?php echo anchor(site_url('arus_kas/pdf'), '<i class="fa fa-file-pdf-o"></i> PDF', 'class="button primary btn-sm"'); ?></h3>
                </div><!-- /.box-header -->
                <div class='box-body'>
        <table class="table bordered" id="mytable">
            <thead >
                <tr>
                    <th style="color: white;" width="80px">No</th>
		    <th style="color: white;">Transaksi</th>
		    <th style="color: white;">Idtransaksi</th>
		    <th style="color: white;">IdPengguna</th>
		    <th style="color: white;">Waktu</th>
		    <th style="color: white;">Masuk</th>
		    <th style="color: white;">Keluar</th>
		    <th style="color: white;">Keterangan</th>
		    <th style="color: white;">Verifikasi</th>
		    <th style="color: white;">Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($arus_kas_data as $arus_kas)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $arus_kas->transaksi ?></td>
		    <td><?php echo $arus_kas->idtransaksi ?></td>
		    <td><?php echo $arus_kas->IdPengguna ?></td>
		    <td><?php echo $arus_kas->waktu ?></td>
		    <td><?php echo $arus_kas->masuk ?></td>
		    <td><?php echo $arus_kas->keluar ?></td>
		    <td><?php echo $arus_kas->keterangan ?></td>
		    <td><?php echo $arus_kas->verifikasi ?></td>
		    <td style="text-align:center" width="140px">
			<?php 
			echo anchor(site_url('arus_kas/read/'.$arus_kas->id),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'button warning btn-sm')); 
			echo '  '; 
			echo anchor(site_url('arus_kas/update/'.$arus_kas->id),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'button success btn-sm')); 
			echo '  '; 
			echo anchor(site_url('arus_kas/delete/'.$arus_kas->id),'<i class="fa fa-trash-o"></i>','title="delete" class="button danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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