        <div id="contentWrapper" style="display: block;">
        <section id='content' style="display: block;">
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>PERCAKAPAN</h3>
                </div><!-- /.box-header -->
                <div class='box-body'>
        <table class="list-data" width="100%" id="mytable">
            <thead>
                <tr>
		    <th>Judul</th>
		    <th>Dari</th>
		    <th>Untuk</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            foreach ($kelola_pesan_data as $kelola_pesan)
            {
                ?>
                <tr>
		    <td><?php echo $kelola_pesan->judul ?></td>
		    <td><?php echo $kelola_pesan->dari ?></td>
		    <td><?php echo $kelola_pesan->untuk ?></td>
		    <td style="text-align:center" width="140px">
			<?php 
			echo anchor(site_url('Kelola_pesan/read/'.$kelola_pesan->id_percakapan),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'button warning')); 
			echo '  '; 
			echo anchor(site_url('Kelola_pesan/delete/'.$kelola_pesan->id_percakapan),'<i class="fa fa-trash-o"></i>','title="delete" class="button danger" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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