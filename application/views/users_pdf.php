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
        <h2>Users List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>No Identitas</th>
		    <th>Nama Pengguna</th>
		    <th>Email</th>
		    <th>Nama Pertama</th>
		    <th>Nama Terakhir</th>
		    <th>No Telepon</th>
		    <th>Alamat</th>
		    <th>Group</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($users_data as $users)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $users->ip_address ?></td>
		    <td><?php echo $users->username ?></td>
		    <td><?php echo $users->email ?></td>
		    <td><?php echo $users->first_name ?></td>
		    <td><?php echo $users->last_name ?></td>
		    <td><?php echo $users->phone ?></td>
		    <td><?php echo $users->company; ?></td>
		    <td>
		    	<?php foreach ($users->groups as $group):?>
					<?php echo anchor("auth/edit_group/".$group->id, htmlspecialchars($group->name,ENT_QUOTES,'UTF-8')) ;?><br />
                <?php endforeach?>
			</td>
	        </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </body>
</html>