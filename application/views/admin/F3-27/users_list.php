        <!-- Main content -->
        <div id="contentWrapper" style="display: block;">
        <section id='content' style="display: block;">
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
		<?php echo anchor(site_url('users/pdf'), 'Export to PDF', array('class'=>'button warning')); ?>
                </div><!-- /.box-header -->
                <div class='box-body'>
        <table class="list-data" id="mytable" width="100%">
            <thead>
                <tr>
            <th width="80px">No</th>
		    <th>Nama Pengguna/Email</th>
		    <th>Nama</th>
		    <th>Alamat</th>
		    <th>Phone</th>
		    <th>Group</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($users_data as $users)
            {
                $user = explode("@la-derma", $users->username);
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $user[0] .' / ( '.$users->email.' )' ?></td>
		    <td><?php echo $users->first_name.' '.$users->last_name ?></td>
		    <td><?php echo $users->company ?></td>
		    <td><?php echo $users->phone ?></td>
		    <td>
		    	<?php foreach ($users->groups as $group):?>
					<?php echo $group->name ?><br />
                <?php endforeach?>
			</td>
		    <td style="text-align:center" width="140px">
			<?php
			echo anchor(site_url('users/update/'.$users->id),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'button success btn-sm')); 
			echo '  '; 
			echo anchor(site_url('users/delete/'.$users->id),'<i class="fa fa-trash-o"></i>','title="delete" class="button danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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