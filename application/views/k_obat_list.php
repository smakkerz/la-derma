
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div>
                <div class='box-header'>
                  <h3 class='box-title'>K_OBAT VIEW <?php echo anchor('k_obat/create/','Create',array('class'=>'btn btn-primary btn-sm'));?>
		<?php echo anchor(site_url('k_obat/excel'), ' <i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('k_obat/word'), '<i class="fa fa-file-word-o"></i> Word', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('k_obat/pdf'), '<i class="fa fa-file-pdf-o"></i> PDF', 'class="btn btn-primary btn-sm"'); ?></h3>
                </div><!-- /.box-header -->
                <div class='box-body'>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>Nama</th>
		    <th>Kategori Obat</th>
		    <th>Stock</th>
		    <th>Harga</th>
		    <th>Status</th>
		    <th>Expired</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($k_obat_data as $k_obat)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $k_obat->nama ?></td>
		    <td><?php echo $k_obat->kategori ?></td>
		    <td><?php echo $k_obat->stock ?></td>
		    <td><?php echo uang($k_obat->harga) ?></td>
		    <td><?php echo $k_obat->status ?></td>
		    <td><?php echo format_tanggal($k_obat->expired) ?></td>
		    <td style="text-align:center" width="140px">
			<?php 
			echo anchor(site_url('k_obat/read/'.$k_obat->id_obat),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-warning btn-sm')); 
			echo '  '; 
			echo anchor(site_url('k_obat/update/'.$k_obat->id_obat),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-success btn-sm')); 
			echo '  '; 
			echo anchor(site_url('k_obat/delete/'.$k_obat->id_obat),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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