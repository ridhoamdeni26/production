<div class="">
        <div class="page-title">
          <div class="title_left">
            <h4>DATA SUJ</small></h4>
          </div>
        </div>
      </div>

        <div class="clearfix"></div>

        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>Management User</h2>
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

        <div class="col-md-6 col-sm-6 col-xs-6">

            <div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div>

          <form action="<?php echo base_url(). 'EntryMol/searchmol'; ?>" method="post">

        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tanggal">Tanggal</label>
              <div class="col-md-6 col-sm-6 col-xs-12 item has-feedback">
                <input type="text" id="TRANSACTION_DATE" name="TRANSACTION_DATE" maxlength="10" class="form-control col-md-7 col-xs-12 dtpicker has-feedback-left" value="<?php if(!empty($date)) { $newDate = date("Y-m-d", strtotime($date)); echo $newDate; } ?>" required="required" />
                  <span class="glyphicon glyphicon-calendar form-control-feedback left" aria-hidden="true"></span>
              </div>
            <div class="clearfix"></div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tipe">Shift</label>
            <div class="col-md-9 col-sm-9 col-xs-12 item">
            <select class="glyphicon glyphicon-time" id="SHIFT" name="SHIFT" style= "width:142px; height:35px">
              <option value="1" <?= ($shift == '1' ? "selected" : "") ?> >1 (00.00 - 08.00) </option>
              <option value="2" <?= ($shift == '2' ? "selected" : "") ?> >2 (08-00 - 16.00) </option>
              <option value="3" <?= ($shift == '3' ? "selected" : "") ?> >3 (16.00 - 00.00) </option>
            </select>
            </div>
          <div class="clearfix"></div>
        </div>

  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
  <input class="btn btn-primary btn-sm" id="search" name="search" title="Search Data" type="submit" value="Search Data" method="post" onClick="" ></input>
</div>
   </form>
        <div class="col-md-6 col-sm-6 col-xs-6">
         <form action="<?php echo base_url(). 'EntryMol/approve'; ?>" onsubmit="return validasi()" method="post">

          <input type="hidden" id="nama_user" name="nama_user" value="<?php echo $this->session->userdata('nama_lengkap'); ?>">
          <input type="hidden" id="shift_1" name="shift_1" value="<?php if(!empty($data)) { echo $shift; } ?>">
          <input type="hidden" id="tanggal" name="tanggal" value="<?php if(!empty($data)) { $newDate = date("m/d/Y", strtotime($date)); echo $newDate; } ?>">


          <div class="form-group">
            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="last-name">Total Quantity</label>
            <div class="col-md-6 col-sm-6 col-xs-6 item">
              <input type="text" id="Total_Quantity1" readonly="" name="Total_Quantity1" class="col-md-4 col-xs-12 form-control" value="<?php if(!empty($total)) { echo $total->Qty; } ?>">
            <div class="clearfix"></div>
                  <br>
                  <input class="btn btn-round btn-success" id="apporvedata" name="apporvedata" type="submit" value="approve" ></input>
                  </form>
                  <a href='#myModal' id="reject" class='btn btn-round btn-danger' data-toggle='modal' onClick="">Reject</a>
                </div>
              <div class="clearfix"></div>
              <br>
          </div>
        </div>
          <br>

            <div class="clearfix"></div>
            <div class="separator"></div>

 <div class="col-md-6 col-sm-6 col-xs-6">
<table class="table table-striped table-bordered">
<br>
  <thead>
    <tr>
      <th><center>Shift</center></th>
      <th><center>Jam</center></th>
      <th><center>Quantity</center></th>
      <th><center>SubTotal</center></th>
    </tr>
    </thead>
      <tbody>
      <?php foreach($data as $post) : ?>
        <tr>
          <td align="center"><?php echo $post['Shift']?></td>
          <td scope="col" align="center"><?php echo $post['Jam'] ?></td>
          <td scope="col "align="center"><?php echo $post['QTY']." KG" ?></td>
          <td align="center"><?php echo $post['total_qty']. " KG" ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

  <?php
        foreach($graph as $data){
            $data_tanggal[] = date('d-m-Y', strtotime($data->tanggal));
            $data_total[] = intval($data->total);


        }
        
    ?>

   <?php
        foreach($graph2 as $data){
            $data_tanggal2[] = date('d-m-Y', strtotime($data->tanggal));
            $data_total2[] = intval($data->total);
            // print_r(json_encode($data_total2));

        }
        // print_r(json_encode($data_total2));
    ?>

     <?php
        foreach($graph3 as $data){
            $data_tanggal3[] = date('d-m-Y', strtotime($data->tanggal));
            $data_total3[] = intval($data->total);
            // print_r(json_encode($data_total2));

        }
    ?>
            <div class="row">
                <div class="clearfix"></div>
                <br>
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Bar Graph</h2>
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
                    <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                  </div>
                </div>
              </div>

<!-- Pop Up Modal Reject -->
<form action="<?php echo base_url(). 'EntryMol/reject'; ?>" onsubmit="return validasi_input(this)" method="post">
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Detail Data</h4>
        </div>
      <div class="modal-body">

        <div class="form-group">
          <input type="hidden" id="user_name" name="user_name" value="<?php echo $this->session->userdata('nama_lengkap'); ?>">
          <input type="hidden" id="shift_rej" name="shift_rej" value="<?php if(!empty($data)) { echo $shift; } ?>">
          <input type="hidden" id="tanggal_rej" name="tanggal_rej" value="<?php if(!empty($data)) { $newDate = date("m/d/Y", strtotime($date)); echo $newDate; } ?>">

          <label class="control-label col-md-3 col-sm-3 col-xs-12">Quantity Machine</label>
            <div class="col-md-9 col-sm-9 col-xs-12">
              <input type="text" id="totalqty" name="totalqty" readonly="readonly" value="<?php if(!empty($total)) { echo $total->Qty; } else echo '0';  ?>" class="form-control">
            </div>
        </div>
       <div class="clearfix"></div>
       <br>

       <label class="control-label col-md-3 col-sm-3 col-xs-12">Quantity Manual</label>
            <div class="col-md-9 col-sm-9 col-xs-12">
              <input type="text" id="qty_reject" name="qty_reject" class="form-control" value="">
            </div>
        </div>
       <div class="clearfix"></div>
       <br>

       <label class="control-label col-md-3 col-sm-3 col-xs-12" for="message">Keterangan :</label>
        <textarea id="message" required="required" class="form-control col-md-3 col-sm-3 col-xs-12 " name="message" data-parsley-trigger="keyup" data-parsley-maxlength="100" data-parsley-validation- threshold="10"></textarea>
       <div class="clearfix"></div>
       <br>

       <div class="modal-footer">
       <button class="btn btn-primary" id="rejectdata" name="rejectdata" type="submit">Reject</button>
       <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
        </div>
      </form>
      </div>
      </div>
    </div>
  </div>
 

<!-- Chart.js -->
<script src="<?php echo base_url() ?>assets/vendors/Chart.js/dist/Chart.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/Chart.js/dist/Chart2.min.js"></script>
<!-- highchart -->
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<!-- <script src="<?php echo base_url() ?>assets/vendors/Highcharts/highcharts.js"></script> -->
<script src="<?php echo base_url() ?>assets/vendors/Highcharts/code/js/highcharts.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/Highcharts/code/js/highcharts-custom.src.js"></script>
<!-- <script src="<?php echo base_url() ?>assets/vendors/Highcharts/code/js/modules/exporting.js"></script> -->
<script src="<?php echo base_url() ?>assets/vendors/Highcharts/code/js/modules/export-data.js"></script>

<script type="text/javascript">
Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Grafik Data Molasses'
    },
    xAxis: {
        categories: <?php echo json_encode($data_tanggal3) ?>,
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Total Molasses per Hari'
        },
        stackLabels: {
            enabled: true,
            style: {
                fontWeight: 'bold',
                color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
            }
        }
    },
    legend: {
        align: 'right',
        x: -30,
        verticalAlign: 'top',
        y: 25,
        floating: true,
        backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || 'white',
        borderColor: '#CCC',
        borderWidth: 1,
        shadow: false
    },
    tooltip: {
        headerFormat: '<b>{point.x}</b><br/>',
        pointFormat: '{series.name}: {point.y}<br/>Total: {point.stackTotal}'
    },
    plotOptions: {
        column: {
            stacking: 'normal',
            dataLabels: {
                enabled: true,
                color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white'
            }
        }
    },
    series: [{
        name: 'Shift 1',
        data: <?php echo json_encode($data_total) ?>,
    }, {
        name: 'Shift 2',
        data: <?php echo json_encode($data_total2) ?>,
    }, {
        name: 'Shift 3',
        data: <?php echo json_encode($data_total3) ?>
    }]
});
</script>

<script>
    function validasi_input(form){
      if ((form.qty_reject.value == "") || (form.totalqty.value == 0)) {
        alert("Periksa Nilai Quantity!");
        form.qty_reject.focus();
            return (false);
          }
        return (true);
        }
</script>

<script>
    function validasi(){
      var total = document.getElementById("Total_Quantity1").value;
      if (total == "") {
        alert('Quantity Masih Kosong!');
      return false;
    }
  }
</script>



<script type="text/javascript">
$(document).ready(function(){
$('.MyHighChart').hide();
});
</script>
