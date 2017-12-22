<div class="row">
            <div class="">
              <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2>Stok Barang & Obat</h2>
                      <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div>
                    
                      
<div id="container" style="min-width: 300px; height: 400px; margin: 0 auto"></div>



    <script type="text/javascript">

Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Stok Barang Hingga Hari Ini'
    },
    xAxis: {
        type: 'category',
        labels: {
            rotation: -45,
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah Barang'
        }
    },
    legend: {
        enabled: false
    },
    tooltip: {
        pointFormat: 'Stok Barang/Obat : <b>{point.y:.1f}</b>'
    },
    series: [{
        name: 'Barang / Obat',
        data: [
            <?php foreach ($graph as $data): ?>
              ['<?php echo $data->nama_barang ?>',<?php echo $data->stok; ?>],
            <?php endforeach ?>
        ],
        dataLabels: {
            enabled: true,
            rotation: -90,
            color: '#FFFFFF',
            align: 'right',
            format: '{point.y:.1f}', // one decimal
            y: 10, // 10 pixels down from the top
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    }]
});
    </script>
<table id="datatable" class="table table-striped table-bordered">
<thead>
      <tr>
        <th>Nama Barang</th>
        <th>Stok</th>
      </tr>
</thead>
<tbody>
      <?php
        foreach ($graph as $data) {
      ?>
      <tr>
        <td><?php echo $data->nama_barang; ?></td>
        <td><?php echo $data->stok; ?></td>
      </tr>
      <?php
        }
      ?>
</tbody>
    </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
