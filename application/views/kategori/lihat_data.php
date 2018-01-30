                <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">
                            POS (Point of Sale) <small>Data Kategori</small>
                        </h2>
                    </div>
                </div> 
                <!-- /. ROW  -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                 <?php echo anchor('Barang/post','Tambah Data',array('class'=>'button button danger')) ?>
                                 <?php echo anchor('Kategori','Kategori Barang',array('class'=>'button button warning')) ?>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table striped bordered hovered" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th style="color: white">No.</th>
                                                <th style="color: white">Nama Kategori</th>
                                                <th style="color: white">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $no=1; foreach ($record->result() as $r) { ?>
                                            <tr class="gradeU">
                                                <td><?php echo $no ?></td>
                                                <td><?php echo $r->nama_kategori ?></td>
                                                <td class="center">
                                                    <?php echo anchor('kategori/edit/'.$r->kategori_id,'Edit'); ?> | 
                                                    <?php echo anchor('kategori/delete/'.$r->kategori_id,'Delete'); ?>
                                                </td>
                                            </tr>
                                        <?php $no++; } ?>
                                        </tbody>
                                    </table>
                                </div>
                                
                            </div>
                        </div>
                        <!-- /. PANEL  -->
                    </div>
                </div>
                <!-- /. ROW  -->
