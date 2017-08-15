<section class='content'>
<h2 style="margin-top:0px">Pasien List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('pasien/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('pasien/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('pasien'); ?>" class="btn btn-default">Reset</a>
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
		<th>Identitas</th>
		<th>Nama</th>
		<th>Alamat</th>
		<th>User</th>
		<th>Pass</th>
		<th>Sex</th>
		<th>Birth Date</th>
		<th>Status</th>
		<th>Action</th>
            </tr><?php
            foreach ($pasien_data as $pasien)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $pasien->identitas ?></td>
			<td><?php echo $pasien->nama ?></td>
			<td><?php echo $pasien->alamat ?></td>
			<td><?php echo $pasien->user ?></td>
			<td><?php echo $pasien->pass ?></td>
			<td><?php echo $pasien->sex ?></td>
			<td><?php echo $pasien->birth_date ?></td>
			<td><?php echo $pasien->status ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('pasien/read/'.$pasien->id_pasien),'Read'); 
				echo ' | '; 
				echo anchor(site_url('pasien/update/'.$pasien->id_pasien),'Update'); 
				echo ' | '; 
				echo anchor(site_url('pasien/delete/'.$pasien->id_pasien),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
		<?php echo anchor(site_url('pasien/excel'), 'Excel', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('pasien/word'), 'Word', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('pasien/pdf'), 'PDF', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
        </section>