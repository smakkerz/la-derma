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
        <h2>K_obat List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama</th>
		<th>Kategori Obat</th>
		<th>Deskripsi</th>
		<th>Stock</th>
		<th>Manufaktur</th>
		<th>Harga</th>
		<th>Status</th>
		<th>Expired</th>
		
            </tr><?php
            foreach ($k_obat_data as $k_obat)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $k_obat->nama ?></td>
		      <td><?php echo $k_obat->kategori_obat ?></td>
		      <td><?php echo $k_obat->deskripsi ?></td>
		      <td><?php echo $k_obat->stock ?></td>
		      <td><?php echo $k_obat->manufaktur ?></td>
		      <td><?php echo $k_obat->harga ?></td>
		      <td><?php echo $k_obat->status ?></td>
		      <td><?php echo $k_obat->expired ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>