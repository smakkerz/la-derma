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
        <h2>Jadwal List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>IdDokter</th>
		<th>Hari</th>
		<th>DariJam</th>
		<th>SampaiJam</th>
		
            </tr><?php
            foreach ($c_jadwal_data as $c_jadwal)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $c_jadwal->idDokter ?></td>
		      <td><?php echo $c_jadwal->Hari ?></td>
		      <td><?php echo $c_jadwal->DariJam ?></td>
		      <td><?php echo $c_jadwal->SampaiJam ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>