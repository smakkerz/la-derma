<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>K_rmedis List</h2>
        <table class="word-table" style="margin-bottom: 10px">
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
		
            </tr><?php
            foreach ($k_rmedis_data as $k_rmedis)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $k_rmedis->id_tindakan ?></td>
		      <td><?php echo $k_rmedis->id_pasien ?></td>
		      <td><?php echo $k_rmedis->diagnosa ?></td>
		      <td><?php echo $k_rmedis->keluhan ?></td>
		      <td><?php echo $k_rmedis->resep ?></td>
		      <td><?php echo $k_rmedis->waktu ?></td>
		      <td><?php echo $k_rmedis->keterangan ?></td>
		      <td><?php echo $k_rmedis->id_pengguna ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>