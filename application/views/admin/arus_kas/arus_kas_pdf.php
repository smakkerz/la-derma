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
        <h2>Arus_kas List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Transaksi</th>
		<th>Idtransaksi</th>
		<th>IdPengguna</th>
		<th>Waktu</th>
		<th>Masuk</th>
		<th>Keluar</th>
		<th>Keterangan</th>
		<th>Verifikasi</th>
		
            </tr><?php
            foreach ($arus_kas_data as $arus_kas)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $arus_kas->transaksi ?></td>
		      <td><?php echo $arus_kas->idtransaksi ?></td>
		      <td><?php echo $arus_kas->IdPengguna ?></td>
		      <td><?php echo $arus_kas->waktu ?></td>
		      <td><?php echo $arus_kas->masuk ?></td>
		      <td><?php echo $arus_kas->keluar ?></td>
		      <td><?php echo $arus_kas->keterangan ?></td>
		      <td><?php echo $arus_kas->verifikasi ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>