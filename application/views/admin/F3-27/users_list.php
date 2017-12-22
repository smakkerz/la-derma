
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class=''>
                <div class=''>
                  <h3 class='box-title'>
                    <?php
                        $url = $this->uri->segment(1);
                        if ($url == "Karyawanld") {
                             echo "User Karyawan";
                         }else{
                            echo "User Akun";
                         }
                    ?> </h3>
                  <?php echo anchor('users/create/','Create',array('class'=>'button primary'));?>
		<?php echo anchor(site_url('users/pdf'), 'Export to PDF', 'class="button"'); ?>
                </div><!-- /.box-header -->
                <div class='box-body'>
        <table class="table bordered hovered striped" id="mytable" width="100%">
            <thead>
                <tr>
            <th width="80px"><font color="white">No</font></th>
		    <th><font color="white">Nama Pengguna</font></th>
		    <th><font color="white">Nama Pertama</font></th>
		    <th><font color="white">Nama Terakhir</font></th>
		    <th><font color="white">Group</font></th>
		    <th><font color="white">Action</font></th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($users_data as $users)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $users->username ?></td>
		    <td><?php echo $users->first_name ?></td>
		    <td><?php echo $users->last_name ?></td>
		    <td>
		    	<?php foreach ($users->groups as $group):?>
					<?php echo $group->name ?><br />
                <?php endforeach?>
			</td>
		    <td style="text-align:center" width="140px">
			<?php 
			echo anchor(site_url('users/read/'.$users->id),'<i class="">Detail</i>',array('title'=>'detail','class'=>'button')); 
			echo '  '; 
			echo anchor(site_url('users/update/'.$users->id),'<i class="fa fa-pencil-square-o">Edit</i>',array('title'=>'edit','class'=>'button success')); 
			echo '  '; 
			echo anchor(site_url('users/delete/'.$users->id),'<i class="fa fa-trash-o">Hapus</i>','title="delete" class="button danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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