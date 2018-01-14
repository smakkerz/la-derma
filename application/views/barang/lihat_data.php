                <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">
                            POS (Point of Sale) <small>Data Barang</small>
                        </h2>
                    </div>
                </div> 
                <!-- /. ROW  -->

                <div class="row">
                    <div class="col-md-12">
                            <div class="panel-heading">
                                 <?php echo anchor('Barang/post','Tambah Data',array('class'=>'button button danger')) ?>
                                 <?php echo anchor('Kategori','Kategori Barang',array('class'=>'button button warning')) ?>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover" id="mytable">
                                        <thead>
                                            <tr>
                                                <th style="color: white">No.</th>
                                                <th style="color: white">Nama Barang</th>
                                                <th style="color: white">Kategori</th>
                                                <th style="color: white">Harga</th>
                                                <th style="color: white">Stok</th>
                                                <th style="color: white">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $no=1; foreach ($record->result() as $r) { ?>
                                            <tr style="color: black;">
                                                <td><?php echo $no ?></td>
                                                <td><?php echo $r->nama_barang ?></td>
                                                <td><?php echo $r->nama_kategori ?></td>
                                                <td><?php echo uang($r->harga) ?></td>
                                                <td><?php echo $r->stok ?></td>
                                                <td class="center" >
                                                    <font color="black"><?php echo anchor('barang/edit/'.$r->barang_id,'Edit'); ?> | 
                                                    <?php echo anchor('barang/delete/'.$r->barang_id,'Delete'); ?></font>
                                                </td>
                                            </tr>
                                        <?php $no++; } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        <!-- /. PANEL  -->
                    </div>
                </div>
                <!-- /. ROW  -->


<script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#mytable").dataTable();
            });
        </script>