
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class=''>
                <div class=''>
                  <h3 class='box-title'>USERS VIEW <?php echo anchor('users/create/','Create',array('class'=>'btn btn-primary btn-sm'));?>
		<?php echo anchor(site_url('users/pdf'), '<i class="fa fa-file-pdf-o"></i> PDF', 'class="btn btn-primary btn-sm"'); ?></h3>
                </div><!-- /.box-header -->
                <div class='box-body'>
        <table class="table table-bordered table-striped" id="mytable" width="100%">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>No Identitas</th>
		    <th>Nama Pengguna</th>
		    <th>Email</th>
		    <th>Nama Pertama</th>
		    <th>Nama Terakhir</th>
		    <th>No Telepon</th>
		    <th>Alamat</th>
		    <th>Group</th>
		    <th>Action</th>
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
		    <td><?php echo $users->ip_address ?></td>
		    <td><?php echo $users->username ?></td>
		    <td><?php echo $users->email ?></td>
		    <td><?php echo $users->first_name ?></td>
		    <td><?php echo $users->last_name ?></td>
		    <td><?php echo $users->phone ?></td>
		    <td><?php echo $users->company; ?></td>
		    <td>
		    	<?php foreach ($users->groups as $group):?>
					<?php echo anchor("auth/edit_group/".$group->id, htmlspecialchars($group->name,ENT_QUOTES,'UTF-8')) ;?><br />
                <?php endforeach?>
			</td>
		    <td style="text-align:center" width="140px">
			<?php 
			echo anchor(site_url('users/read/'.$users->id),'<i class="">Detail</i>',array('title'=>'detail','class'=>'button')); 
			echo '  '; 
			echo anchor(site_url('users/update/'.$users->id),'<i class="fa fa-pencil-square-o">Edit</i>',array('title'=>'edit','class'=>'btn btn-success btn-sm')); 
			echo '  '; 
			echo anchor(site_url('users/delete/'.$users->id),'<i class="fa fa-trash-o">Hapus</i>','title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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