
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>KARYAWAN VIEW <?php echo anchor('Karyawanld/create/','Create',array('class'=>'btn btn-primary btn-sm'));?>
		<?php echo anchor(site_url('Karyawanld/excel'), ' <i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('Karyawanld/pdf'), '<i class="fa fa-file-pdf-o"></i> PDF', 'class="btn btn-primary btn-sm"'); ?></h3>
                </div><!-- /.box-header -->
                <div class='box-body'>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>Nama Karyawan</th>
		    <th>Email Karyawan</th>
		    <th>Jk</th>
		    <th>Alamat Karyawan</th>
            <th>Jabatan</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($Karyawanld_data as $karyawanld)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $karyawanld->nama_karyawan ?></td>
		    <td><?php echo $karyawanld->email_karyawan ?></td>
		    <td><?php echo $karyawanld->jk ?></td>
		    <td><?php echo $karyawanld->alamat_karyawan ?></td>
            <td><?php 
            $data = $this->Karyawanld_model->cek_group($karyawanld->email_karyawan);
                foreach ($data as $g) {
                    echo $g->name;
                }
             ?></td>
		    <td style="text-align:center" width="140px">
			<?php 
			echo anchor(site_url('Karyawanld/read/'.$karyawanld->nik),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-warning btn-sm')); 
			echo '  '; 
			echo anchor(site_url('Karyawanld/update/'.$karyawanld->nik),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-success btn-sm')); 
			echo '  '; 
			echo anchor(site_url('Karyawanld/delete/'.$karyawanld->nik),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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