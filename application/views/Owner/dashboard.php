<div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Pengguna Login Terakhir</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <div class="dashboard-widget-content">

                    <ul class="list-unstyled timeline widget">
                      <li>
                        <?php
                        	$user = $this->Owner_model->last_login();
                        	foreach ($user as $data) {
                        		echo "<li>";
                        		echo date('d-m-Y',strtotime(unix_to_human($data->last_login)));
                        		echo "- ".$data->first_name." ".$data->last_name;
                        		echo "</li>";
                        	}
                        ?>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>


            <div class="col-md-8 col-sm-8 col-xs-12">



              <div class="row">

                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2>10 Transaksi Terakhir</h2>
                      <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div>
                    	<table class="table">
                    		<tr>
                    			<th>Tanggal Transaksi</th>
                    			<th>Operator</th>
                    			<th>Jenis Jasa</th>
                    		</tr>
                      <?php
                      	foreach ($transaksi_trakhir as $data_tx) {
                      ?>
                      <tr>
                      	<td><?= $data_tx->tanggal_transaksi ?></td>
                      	<td><?= $data_tx->operator_id ?></td>
                      	<td><?= $data_tx->jenis ?></td>
                      </tr>
                      <?php
                      	}
                      ?>
                  		</table>
                    </div>
                  </div>
                </div>

              </div>
              <div class="row">


                <!-- Start to do list -->
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2>Keuntungan</h2>
                      <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                    	<?php
                    		foreach ($keuntungan as $keuntungan_data) {
                    			echo uang($keuntungan_data->masuk);
                    		}
                    	?>
                    	
                    </div>
                  </div>
                </div>
                <!-- End to do list -->
                
                <!-- start of weather widget -->
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2>Hutang</h2>
                      <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <?php
                      	foreach ($hutang as $hutang_data) {
                      		echo uang($hutang_data->keluar);
                      	}
                      ?>
                    </div>
                  </div>

                </div>
                <!-- end of weather widget -->
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
