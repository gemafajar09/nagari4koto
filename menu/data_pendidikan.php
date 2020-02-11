<style>
    .highcharts-figure, .highcharts-data-table table {
    min-width: 320px; 
    max-width: 800px;
    margin: 1em auto;
}

.highcharts-data-table table {
	font-family: Verdana, sans-serif;
	border-collapse: collapse;
	border: 1px solid #EBEBEB;
	margin: 10px auto;
	text-align: center;
	width: 100%;
	max-width: 500px;
}
.highcharts-data-table caption {
    padding: 1em 0;
    font-size: 1.2em;
    color: #555;
}
.highcharts-data-table th {
	font-weight: 600;
    padding: 0.5em;
}
.highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
    padding: 0.5em;
}
.highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
    background: #f8f8f8;
}
.highcharts-data-table tr:hover {
    background: #f1f7ff;
}


input[type="number"] {
	min-width: 50px;
}
</style>
<div class="card">
    <div class="card-body">
        <div id="donat"></div>
        <table class="table table-bordered table-hover" style="font-size:13px">
            <thead>
                <tr>
                    <td rowspan="2">NO</td>
                    <td rowspan="2">Kelompok</td>
                    <td colspan="2">Jumlah</td>
                    <td colspan="2">Laki-laki</td>
                    <td colspan="2">Perempuan</td>
                </tr>
                <tr>
                    <td>n</td>
                    <td>%</td>
                    <td>n</td>
                    <td>%</td>
                    <td>n</td>
                    <td>%</td>
                </tr>
            </thead>
            <tbody>
              <?php
                $data = $kon->query("SELECT * FROM datapendidik");
                foreach ($data as $i => $a) {
              ?>
                <tr>
                    <td><?= $i+1 ?></td>
                    <td><?= $a["pendkk_kel"]; ?></td>
                    <td><?= $a["pendkk_jml"]; ?></td>
                    <td><?= $a["pendkk_jml2"]; ?></td>
                    <td><?= $a["pendkk_lk"]; ?></td>
                    <td><?= $a["pendkk_lk2"]; ?></td>
                    <td><?= $a["pendkk_pr"]; ?></td>
                    <td><?= $a["pendkk_pr2"]; ?></td>
                </tr>
              <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<!-- chart -->
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script src="https://code.highcharts.com/modules/variable-pie.js"></script>
<script>
      Highcharts.chart('donat', {
    chart: {
        type: 'variablepie'
    },
    title: {
        text: 'Data Pendidikan Yang Ditempuh'
    },
    tooltip: {
        headerFormat: '',
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
    point: {
      valueSuffix: '%'
    }
  },
  plotOptions: {
    pie: {
      allowPointSelect: true,
      cursor: 'pointer',
      dataLabels: {
        enabled: true,
        format: '<b>{point.name}</b>: {point.percentage:.1f} %'
      },
        showInLegend: true
    }
  },
    series: [{
        minPointSize: 10,
        innerSize: '20%',
        zMin: 0,
        colorByPoint: true,
        name: 'countries',
        <?php 
          $data = $kon->query("SELECT * FROM datapendidik");
          $data_grafik = array();
          while($row = mysqli_fetch_array($data))
          {
            $data_grafik[] = array(
              "name" => $row['pendkk_kel'] ,
              "y" => (int)$row['pendkk_jml'],
              "z" => (int)$row['pendkk_jml2']
            );
          }
        ?>
        data: <?=json_encode($data_grafik)?> 
    }]
});
</script>