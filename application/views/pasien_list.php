
        <!-- Main content -->
        <div id="contentWrapper" style="display: block;">
        <section id='content' style="display: block;">
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>DATA PASIEN <?php echo anchor('pasien/create/','Create',array('class'=>'button primary'));?>
		<?php echo anchor(site_url('pasien/pdf'), '<i class="fa fa-file-pdf-o"></i> PDF', 'class="button primary"'); ?></h3>
                </div><!-- /.box-header -->
                <div class='box-body'>
        <table class="list-data" width="100%" id="mytable">
            <thead>
                <tr>
                    <th width="80px">ID</th>
		    <th>Identitas</th>
		    <th>Nama</th>
            <th>Email</th>
		    <th>Jenis Kelamin</th>
		    <th>Birth Date</th>
            <th>No Hp</th>
		    <th>Status</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($pasien_data as $pasien)
            {
                ?>
                <tr>
		    <td><?php echo $pasien->id_pasien?></td>
		    <td><?php echo $pasien->identitas ?></td>
		    <td><?php echo $pasien->nama ?></td>
            <td><?php echo $pasien->user ?></td>
		    <td><?php echo $pasien->sex ?></td>
		    <td><?php echo $pasien->birth_date ?></td>
            <td><?php echo $pasien->no_hp ?></td>
		    <td><?php echo $pasien->status ?></td>
		    <td style="text-align:center" width="140px">
			<?php 
			echo anchor(site_url('pasien/read/'.$pasien->id_pasien),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'button warning btn-sm')); 
			echo '  '; 
			echo anchor(site_url('pasien/update/'.$pasien->id_pasien),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'button success btn-sm')); 
			echo '  '; 
			echo anchor(site_url('pasien/delete/'.$pasien->id_pasien),'<i class="fa fa-trash-o"></i>','title="delete" class="button danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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