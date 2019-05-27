    <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>DATA SUJ</small></h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <!-- Grafik Mol -->
            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Mol Graph<small>Sessions</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
    <?php
        foreach($data as $data){
            $data_tanggal[] = date('d-m-Y', strtotime($data->TRANSACTION_DATE));
            $data_total[] = $data->QUANTITY_MACHINE;
            $data_totalmol[] = $data->QUANTITY_MANUAL;
        }
    ?>


                  <div class="x_content">
                    <form class="form-horizontal">
                    <div class="input-prepend input-group">
                      <span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
                        <input type="text" id="date" name="date" maxlength="10" required="required" class="form-control" style="width: 200px" />
                      </div>
                    </form>
                    <canvas id="molChart" width="50" height="50" ></canvas>
                  </div>
                </div>
              </div>
          <!-- /Grafik Mol -->

            <!-- Grafik Coal -->
            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Coal Graph<small>Sessions</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
    <?php
        foreach($data1 as $data){
            $data_tanggalcoal[] = date('d-m-Y', strtotime($data->TRANSACTION_DATE));
            $data_totalcoal[] = $data->QUANTITY_MACHINE;
            $data_totalcoal1[] = $data->QUANTITY_MANUAL;
        }
    ?>


                  <div class="x_content">
                    <canvas id="coalChart" width="50" height="50" ></canvas>
                  </div>
                </div>
              </div>
          <!-- /Grafik Coal -->

<div class="clearfix"></div>
            <!-- Grafik Raw -->
            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Raw Graph<small>Sessions</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
    <?php
        foreach($data2 as $data){
            $data_tanggalraw[] = date('d-m-Y', strtotime($data->TRANSACTION_DATE));
            $data_totalraw[] = $data->QUANTITY_MACHINE;
            $data_totalraw1[] = $data->QUANTITY_MANUAL;
        }
    ?>


                  <div class="x_content">
                    <canvas id="rawChart" width="50" height="50" ></canvas>
                  </div>
                </div>
              </div>
          <!-- /Grafik Raw -->

<!-- Chart.js -->
<script src="<?php echo base_url() ?>assets/vendors/Chart.js/dist/Chart.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/Chart.js/dist/Chart2.min.js"></script>

<script type="text/javascript">
var densityCanvas = document.getElementById("molChart");
var densityData = {
  label: 'Data SUJ MOL',
  data: <?php echo json_encode($data_total);?>,
  backgroundColor: 'rgba(0, 99, 132, 0.6)',
  borderWidth: 0,
  yAxisID: "y-axis-density"
};

var gravityData = {
  label: 'DATA ACT MOL',
  data: <?php echo json_encode($data_totalmol) ?>,
  backgroundColor: 'rgba(99, 132, 0, 0.6)',
  borderWidth: 0,
  yAxisID: "y-axis-gravity"
};

var planetData = {
  labels: <?php echo json_encode($data_tanggal);?>,
  datasets: [densityData, gravityData]
};

var chartOptions = {
  scales: {
    xAxes: [{
      barPercentage: 1,
      categoryPercentage: 0.6
    }],
    yAxes: [{
      id: "y-axis-density"
    }, {
      id: "y-axis-gravity"
    }]
  }
};

var barChart = new Chart(densityCanvas, {
  type: 'bar',
  data: planetData,
  options: chartOptions
});
</script>

<script type="text/javascript">
var densityCanvas = document.getElementById("coalChart");
var densityData = {
  label: 'Data SUJ Coal',
  data: <?php echo json_encode($data_totalcoal) ?>,
  borderColor: 'rgba(255,99,132,1)',
  backgroundColor: 'blue',
  borderWidth: 0,
  yAxisID: "y-axis-density"
};

var gravityData = {
  label: 'DATA ACT COAL',
  data: <?php echo json_encode($data_totalcoal1) ?>,
  borderColor: 'rgba(255,99,132,1)',
  backgroundColor: 'red',
  borderWidth: 0,
  yAxisID: "y-axis-gravity"
};

var planetData = {
  labels: <?php echo json_encode($data_tanggalcoal) ?>,
  datasets: [densityData, gravityData]
};

var chartOptions = {
  scales: {
    xAxes: [{
      barPercentage: 1,
      categoryPercentage: 0.6
    }],
    yAxes: [{
      id: "y-axis-density"
    }, {
      id: "y-axis-gravity"
    }]
  }
};

var barChart = new Chart(densityCanvas, {
  type: 'bar',
  data: planetData,
  options: chartOptions
});
</script>

<script type="text/javascript">
var densityCanvas = document.getElementById("rawChart");
var densityData = {
  label: 'Data SUJ RAW',
  data: <?php echo json_encode($data_totalraw) ?>,
  borderColor: 'rgba(255,99,132,1)',
  backgroundColor: 'rgb(27,207,85)',
  borderWidth: 0,
  yAxisID: "y-axis-density"
};

var gravityData = {
  label: 'DATA ACT RAW',
  data: <?php echo json_encode($data_totalraw1) ?>,
  borderColor: 'rgba(255,99,132,1)',
  backgroundColor: 'rgb(245,235,24)',
  borderWidth: 0,
  yAxisID: "y-axis-gravity"
};

var planetData = {
  labels: <?php echo json_encode($data_tanggalraw) ?>,
  datasets: [densityData, gravityData]
};

var chartOptions = {
  scales: {
    xAxes: [{
      barPercentage: 1,
      categoryPercentage: 0.6
    }],
    yAxes: [{
      id: "y-axis-density"
    }, {
      id: "y-axis-gravity"
    }]
  }
};

var barChart = new Chart(densityCanvas, {
  type: 'bar',
  data: planetData,
  options: chartOptions
});
</script>

<script type="text/javascript">
  // $(function() {

  //   // Set the default dates, uses sugarjs' methods
  //   var startDate   = Date.create().addDays(-6),    // 6 days ago
  //       endDate     = Date.create();                // today

  //   var range = $('#date');

  //   // Show the dates in the range input
  //   range.val(startDate.format('{MM}/{dd}/{yyyy}') + '-' + endDate.format('{MM}/{dd}/{yyyy}'));

  //   // Load chart
  //   ajaxLoadChart(startDate,endDate);

  //   range.daterangepicker({

  //       startDate: startDate,
  //       endDate: endDate,

  //       ranges: {
  //           'Today': ['today', 'today'],
  //           'Yesterday': ['yesterday', 'yesterday'],
  //           'Last 7 Days': [Date.create().addDays(-6), 'today'],
  //           'Last 30 Days': [Date.create().addDays(-29), 'today']
  //           // You can add more entries here
  //       }
  //   },function(start, end){

  //       ajaxLoadChart(start, end);

  //   });
</script>