<section class='content'>
<h2 style="margin-top:0px">K_rmedis List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('k_rmedis/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('k_rmedis/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('k_rmedis'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Tindakan</th>
		<th>Id Pasien</th>
		<th>Diagnosa</th>
		<th>Keluhan</th>
		<th>Resep</th>
		<th>Waktu</th>
		<th>Keterangan</th>
		<th>Id Pengguna</th>
		<th>Action</th>
            </tr><?php
            foreach ($k_rmedis_data as $k_rmedis)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $k_rmedis->id_tindakan ?></td>
			<td><?php echo $k_rmedis->id_pasien ?></td>
			<td><?php echo $k_rmedis->diagnosa ?></td>
			<td><?php echo $k_rmedis->keluhan ?></td>
			<td><?php echo $k_rmedis->resep ?></td>
			<td><?php echo $k_rmedis->waktu ?></td>
			<td><?php echo $k_rmedis->keterangan ?></td>
			<td><?php echo $k_rmedis->id_pengguna ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('k_rmedis/read/'.$k_rmedis->id_rmedis),'Read'); 
				echo ' | '; 
				echo anchor(site_url('k_rmedis/update/'.$k_rmedis->id_rmedis),'Update'); 
				echo ' | '; 
				echo anchor(site_url('k_rmedis/delete/'.$k_rmedis->id_rmedis),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
		<?php echo anchor(site_url('k_rmedis/excel'), 'Excel', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('k_rmedis/word'), 'Word', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('k_rmedis/pdf'), 'PDF', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
        </section>