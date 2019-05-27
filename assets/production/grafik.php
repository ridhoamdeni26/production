<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentelella Alela! | </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
        <!-- bootstrap-datetimepicker -->
    <link href="../vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
    <link href="../vendors/bootstrap-datepicker/datepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>


  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Gentelella Alela!</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>John Doe</h2>
              </div>
              <div class="clearfix"></div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="grafik.php">Dashboard</a></li>
                      <li><a href="capture.php">Approve/Reject Data Capture</a></li>
                      <li><a href="input.php">Input Data</a></li>
                      <li><a href="#">Report</a></li>
                      <li><a href="coba.php">Build</a></li>
                    </ul>
                  </li>
                </ul>
              </div>

            </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/img.jpg" alt="">John Doe
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Profile</a></li>
                    <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Help</a></li>
                    <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>GRAFIK</h3>
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
                  <div class="x_content">
                    <canvas id="myChart" width="50" height="50" ></canvas>
                  </div>
                </div>
              </div>

            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Coal Graph <small>Sessions</small></h2>
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
                  <div class="x_content">
                    <div class="container">
                    <canvas id="myChart1" width="50" height="50" ></canvas>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Raw Graph <small>Sessions</small></h2>
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
                  <div class="x_content">
                    <canvas id="myChart2" width="50" height="50" ></canvas>
                  </div>
                </div>
              </div>

<?php

error_reporting(E_ALL);

$host = '192.168.169.4'; // IP database
$port = '1532';      // PORT

// Oracle service name (instance)
$db_name     = 'DEV';  // Nama Database
$db_username = "apps";   // Nama Username
$db_password = "apps";   // Password

$tns = "(DESCRIPTION =
  (CONNECT_TIMEOUT=3)(RETRY_COUNT=0)
    (ADDRESS_LIST =
      (ADDRESS = (PROTOCOL = TCP)(HOST = $host)(PORT = $port))
    )
    (CONNECT_DATA =
      (SERVICE_NAME = $db_name)
    )
  )";
$tns = "$host:$port/$db_name";

$conn = oci_connect($db_username, $db_password, $tns); // menghubungkan konkesi ke server oracle
if (!$conn) {
        $e = oci_error();
        throw new Exception($e['message']);
    }

  $query="SELECT TRANSACTION_DATE, SUM(QUANTITY_MANUAL) AS QUANTITY_MANUAL from SUJ_INV_INTERFACE_COAL_RS where ITEM_CODE='1-FG-MOL-00001' GROUP by TRANSACTION_DATE order by TRANSACTION_DATE asc";
  $hasil = oci_parse($conn, $query);

  oci_execute($hasil);

  $data_tanggal= array();
  $data_total= array();

  while($rows=oci_fetch_array($hasil)){
    $data_tanggal[] = date('d-m-Y', strtotime($rows['TRANSACTION_DATE']));
    $data_total[] = $rows['QUANTITY_MANUAL'];

?>
<?php
}
  $query2="SELECT TRANSACTION_DATE, SUM(QUANTITY_MACHINE) AS QUANTITY_MACHINE from SUJ_INV_INTERFACE_COAL_RS where ITEM_CODE='1-FG-MOL-00001'GROUP by TRANSACTION_DATE order by TRANSACTION_DATE asc";
  $hasil2 = oci_parse($conn, $query2);

  oci_execute($hasil2);

  $data_totalmol= array();

  while($rows2=oci_fetch_array($hasil2)){
    $data_totalmol[] = $rows2['QUANTITY_MACHINE'];
?>
<?php
}
$query3="SELECT TRANSACTION_DATE, SUM(QUANTITY_MANUAL) AS QUANTITY_MANUAL from SUJ_INV_INTERFACE_COAL_RS where ITEM_CODE='1-RM-BRM-00008'GROUP by TRANSACTION_DATE order by TRANSACTION_DATE asc";
  $hasil3 = oci_parse($conn, $query3);

  oci_execute($hasil3);

  $data_totalcoal= array();
  $data_tanggalcoal= array();

  while($rows3=oci_fetch_array($hasil3)){
    $data_tanggalcoal[] = date('d-m-Y', strtotime($rows3['TRANSACTION_DATE']));
    $data_totalcoal[] = $rows3['QUANTITY_MANUAL'];
?>
<?php
}
$query4="SELECT TRANSACTION_DATE, SUM(QUANTITY_MACHINE) AS QUANTITY_MACHINE from SUJ_INV_INTERFACE_COAL_RS where ITEM_CODE='1-RM-BRM-00008'GROUP by TRANSACTION_DATE order by TRANSACTION_DATE asc";
  $hasil4 = oci_parse($conn, $query4);

  oci_execute($hasil4);

  $data_totalcoal1= array();

  while($rows4=oci_fetch_array($hasil4)){
    $data_totalcoal1[] = $rows4['QUANTITY_MACHINE'];
?>
<?php
}
$query4="SELECT TRANSACTION_DATE, SUM(QUANTITY_MANUAL) AS QUANTITY_MANUAL from SUJ_INV_INTERFACE_COAL_RS where ITEM_CODE='1-RS-RAW-00001'GROUP by TRANSACTION_DATE order by TRANSACTION_DATE asc";
  $hasil4 = oci_parse($conn, $query4);

  oci_execute($hasil4);

  $data_totalraw= array();
  $data_tanggalraw= array();

  while($rows4=oci_fetch_array($hasil4)){
    $data_tanggalraw[] = date('d-m-Y', strtotime($rows4['TRANSACTION_DATE']));
    $data_totalraw[] = $rows4['QUANTITY_MANUAL'];
?>
<?php
}
$query5="SELECT TRANSACTION_DATE, SUM(QUANTITY_MACHINE) AS QUANTITY_MACHINE from SUJ_INV_INTERFACE_COAL_RS where ITEM_CODE='1-RS-RAW-00001'GROUP by TRANSACTION_DATE order by TRANSACTION_DATE asc";
  $hasil5 = oci_parse($conn, $query5);

  oci_execute($hasil5);

  $data_totalraw1= array();

  while($rows5=oci_fetch_array($hasil5)){
    $data_totalraw1[] = $rows5['QUANTITY_MACHINE'];
?>
<?php
}

?>



                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- /page content -->

        <!-- footer content -->
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
    <script src="../vendors/Chart.js/dist/Chart2.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-datetimepicker -->    
    <script src="../vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
    <script src="../vendors/bootstrap-datepicker/build/js/datepicker.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
    <!-- morris.js -->
    <script src="../vendors/raphael/raphael.min.js"></script>
    <script src="../vendors/morris.js/morris.min.js"></script>

    <!-- ChartMol -->
    <script type="text/javascript">
var densityCanvas = document.getElementById("myChart");
var densityData = {
  label: 'Data SUJ MOL',
  data: <?php echo json_encode($data_total) ?>,
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
  labels: <?php echo json_encode($data_tanggal) ?>,
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


<!-- ChartCoal -->
<script type="text/javascript">
var densityCanvas = document.getElementById("myChart1");
var densityData = {
  label: 'Data SUJ MOL',
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

<!-- ChartRaw -->
<script type="text/javascript">
var densityCanvas = document.getElementById("myChart2");
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

  </body>
</html>
