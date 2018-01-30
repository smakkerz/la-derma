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
        <h2>K_janji List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Pasien</th>
		<th>IdDokter</th>
		<th>Tanggal</th>
		<th>Jam</th>
		<th>IdPengguna</th>
		
            </tr><?php
            foreach ($k_janji_data as $k_janji)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $k_janji->id_pasien ?></td>
		      <td><?php echo $k_janji->idDokter ?></td>
		      <td><?php echo $k_janji->Tanggal ?></td>
		      <td><?php echo $k_janji->Jam ?></td>
		      <td><?php echo $k_janji->IdPengguna ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>