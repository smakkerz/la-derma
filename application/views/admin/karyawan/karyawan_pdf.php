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
        <h2>Karyawan List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama Karyawan</th>
		<th>Email Karyawan</th>
		<th>Jk</th>
		<th>Alamat Karyawan</th>
		
            </tr><?php
            foreach ($Karyawanld_data as $karyawanld)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $karyawanld->nama_karyawan ?></td>
		      <td><?php echo $karyawanld->email_karyawan ?></td>
		      <td><?php echo $karyawanld->jk ?></td>
		      <td><?php echo $karyawanld->alamat_karyawan ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>