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
        <h2>Pasien List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Identitas</th>
		<th>Nama</th>
		<th>Alamat</th>
		<th>User</th>
		<th>Phone</th>
		<th>Sex</th>
		<th>Birth Date</th>
		<th>Status</th>
		
            </tr><?php
            foreach ($pasien_data as $pasien)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $pasien->identitas ?></td>
		      <td><?php echo $pasien->nama ?></td>
		      <td><?php echo $pasien->alamat ?></td>
		      <td><?php echo $pasien->user ?></td>
		      <td><?php echo $pasien->no_hp ?></td>
		      <td><?php echo $pasien->sex ?></td>
		      <td><?php echo $pasien->birth_date ?></td>
		      <td><?php echo $pasien->status ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>