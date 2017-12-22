<div class="row">
            <div class="">
              <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2>Laporan Pemasukan & Pengeluaran</h2>
                      <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div>
                    	Dari Tanggal <input type="date" name="dari" class="form-control"> sd <input type="date" name="sd" class="form-control"> <input type="submit" value="Cek" name="cek" class="btn btn-primary">
                      
<div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
<?php
  foreach ($graph as $data) {
    $pemasukan = $data->pemasukan;
    $pengeluaran = $data->pengeluaran;
  }
  $total = $pemasukan+$pengeluaran;
  $perpem = ($pemasukan/$total)*100;
  $perpeng = ($pengeluaran/$total)*100;
?>

<table class="table">
  <tr>
    <th>Pemasukan</th>
    <th>Pengeluaran</th>
  </tr>
  <tr>
    <td><?php echo uang($pemasukan); ?></td>
    <td><?php echo uang($pengeluaran); ?></td>
  </tr>
</table>
    <script type="text/javascript">

Highcharts.chart('container', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Laporan Pemasukan & Pengeluaran La Derma Skin Care'
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
        name: 'Total',
        colorByPoint: true,
        data: [{
            name: 'Pemasukan',
            y: <?php echo $perpem ?>
        }, {
            name: 'Pengeluaran',
            y: <?php echo $perpeng; ?>,
            sliced: true,
            selected: true
        }]
    }]
});
    </script>
</head>
<body>
 
<div id="container"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
