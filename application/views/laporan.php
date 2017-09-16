<script type="text/javascript">
 
$(function () {
    $('#stok_obat').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: 'Stok Obat'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Stok Obat',
            data: [
                    <?php 
                    // data yang diambil dari database
                    if(count($lap)>0)
                    {
                       foreach ($lap as $data) {
                       echo "['" .$data->nama . "'," . $data->stock ."],\n";
                       }
                    }
                    ?>
            ]
        }]
    });
});
 
</script>
<script type="text/javascript">
 
$(function () {
    $('#pemasukan').highcharts({
        chart: {
            renderTo: 'chart',
            type: 'line',
        },
        title: {
            text: 'Pendapatan Hingga Hari Ini',
            x: -20
        },
        subtitle: {
            text: 'La-Derma',
            x: -20
        },
        xAxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                    'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
        },
        yAxis: {
            title: {
                text: 'Pendapatan'
            }
        },
        series: [{
            name: 'Pendapatan',
            data: <?php echo json_encode($data); ?>
        }]
    });
});
 
</script>
    <!-- STOK OBAT END -->
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div>
                <div class='box-header'>
                <h3 class='box-title'>Laporan</h3>
                <table class="table table-bordered table-striped" id="mytable">
                	<tr>
                		<th>Stok Obat hingga hari ini</th>
                	</tr>
                	<tr>
                		<td><div id='stok_obat'></div></td>
                	</tr>
                    <tr>
                        <td>
                            <table class="table table-bordered">
                        <tr>
                            <th>Nama Obat</th>
                            <th>Stok</th>
                        </tr>
                        <?php 
                    // data yang diambil dari database
                    if(count($lap)>0)
                    {
                       foreach ($lap as $data) {
                      ?>
                      
                        <tr>
                            <td><?= $data->nama ?></td>
                            <td><?= $data->stock ?></td>
                        </tr>
                      
                      <?php
                       }
                    }
                    ?>
                    </table>
                        </td>
                    </tr>
                    <tr>
                        <th>Laporan Pemasukan Hingga Hari Ini</th>
                    </tr>
                    <tr>
                        <td><div id="pemasukan"></div></td>
                    </tr>
                </table>
            </div>
        </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->

