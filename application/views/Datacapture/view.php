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

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Approve/Reject Data Capture</h2>
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
                  <div class="x_content"></div>

            <div class="col-md-6 col-sm-6 col-xs-6">

              <form action="<?php echo base_url(). 'datacapture/hasilqty'; ?>" method="post">

                <div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tipe">Item Code</label>
                    <div class="col-md-9 col-sm-9 col-xs-12 item">
                    <select id="ITEM_CODE" name="ITEM_CODE" class="form-control col-md-7 col-xs-12">
                      <option value="1">- ITEM CODE -</option>
                    </select>
                    </div>
                  <div class="clearfix"></div>
                </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tanggal">Tanggal</label>
                  <div class="col-md-9 col-sm-9 col-xs-12 item has-feedback">
                    <input type="text" id="TRANSACTION_DATE" name="TRANSACTION_DATE" maxlength="10" required="required" class="form-control col-md-7 col-xs-12 dtpicker has-feedback-left" value="" placeholder="Date" />
                      <span class="glyphicon glyphicon-calendar form-control-feedback left" aria-hidden="true"></span>
                  </div>
                <div class="clearfix"></div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tipe">Shift</label>
                <div class="col-md-9 col-sm-9 col-xs-12 item">
                <select id="SHIFT" name="SHIFT" class="form-control col-md-7 col-xs-12">
                <option value="1">- SHIFT -</option>
                </select>
                </div>
              <div class="clearfix"></div>
            </div>

              </div>
                  <div class="clearfix"></div>
                  <div class="separator"></div>

    <div class="">
      <input class="btn btn-primary btn-sm" title="Search Data" type="submit" value="Search Data" method="post" ></input>
    </div>
    </form>
      <!--  </form> -->
    <div class="separator"></div>

<table id="myTable" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>No</th>
              <th>Action Approve</th>
              <th>ID</th>
              <th>ITEM CODE</th>
              <th>TANGGAL</th>
              <th>SHIFT</th>
              <th>QUANTITY_MACHINE</th>
              <th>QUANTITY_MANUAL</th>
              <th>UOM_CODE</th>
              <th>DATE_APPROVE</th>
              <th>Action Reject</th>
            </tr>
          </thead>

            <tbody>
          <?php
            $no = 1;
            foreach($oracle as $row) {
            ?>     
            <tr>
              <td></td>
              <td>
                <!-- <a href='#Approve1' id="approve" class='btn btn-round btn-success' data-toggle='modal' 
                  onClick="approve(<?php echo $row->ID;?>)">Approve</a> -->
                  <a href="dataApp/?id=<?php  echo $row->ID; ?>" class="btn btn-round btn-success approve">Approve</a>
              </td>
              <td><?php echo $row->ID; ?></td>
              <td><?php echo $row->ITEM_CODE; ?></td>
              <td><?php echo $row->TRANSACTION_DATE; ?> </td>
              <td><?php echo $row->SHIFT; ?></td>
              <td><?php echo $row->QUANTITY_MACHINE; ?></td>
              <td><?php echo $row->QUANTITY_MANUAL; ?></td>
              <td><?php echo $row->UOM_CODE; ?></td>
              <td><?php echo $row->DATE_APPROVE; ?></td>
              <td>
                <a href='#myModal' id="reject" class='btn btn-round btn-danger' data-toggle='modal' 
                  onClick="reject(<?php echo $row->ID;?>)">Reject</a>
              </td>
            </tr>
            <?php
                  $no++; }
                ?> 
          </tbody>
        </table>

<!-- Pop Up Modal -->
      <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Detail Data</h4>
            </div>  
          <div class="modal-body">

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Quantity Machine</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="hidden" id="UP_ID">
                  <input type="text" id="QUANTITY_MACHINE" readonly="readonly" class="form-control">
                </div>
            </div>
           <div class="clearfix"></div>
           <br>

           <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Quantity Manual</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" id="QUANTITY_MANUAL" class="form-control" value="">
                </div>
            </div>
           <div class="clearfix"></div>
           <br>

           <div class="modal-footer">
           <button class="btn btn-primary" id="submit" type="submit">Reject</button>
           <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
            </div>
          </div>
          </div>
        </div>
      </div>

<!-- Pop Up Modal -->
<div class="modal fade" id="Approve1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Detail Data</h4>
            </div>  
          <div class="modal-body">
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">ID</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" id="" class="form-control">
                </div>
            </div>
           <div class="clearfix"></div>
          </div>
          </div>
        </div>
      </div>

<!-- script reject dan update -->
  <script>
  var SITE_URL = "<?php echo site_url() ?>";
  function reject(id){
      //alert(id);
        console.log(id);

        var req = $.ajax({
          url : SITE_URL + "Datacapture/edit",
          method : "GET",
          async : false,
          cache : false,
          data   : {
              id : id
          }
        });

        req.done(function(resp){
              var obj = JSON.parse(resp);
              $("#QUANTITY_MACHINE").val(obj.QUANTITY_MACHINE);
              $("#QUANTITY_MANUAL").val(obj.QUANTITY_MANUAL);
              $("#UP_ID").val(obj.ID);
              // console.log(obj.ITEM_CODE);
        });
       
    }

    //pakai event listner untuk manggil event click
    document.getElementById('submit').addEventListener('click',function(e){
        var QUANTITY_MANUAL = document.getElementById('QUANTITY_MANUAL').value;
        //di check apakahqty terinput
        if(QUANTITY_MANUAL.length > 0 || QUANTITY_MANUAL != "" ){
            //proses 
            var proses = $.ajax({
              url : SITE_URL + "Datacapture/ubah",
              async : false,
              cache : false,
              method : "POST",
              data : {
                  QM : QUANTITY_MANUAL,
                  ID : document.getElementById('UP_ID').value
              }
            });

            proses.done(function(msg){
              console.log(msg);
              $("#myModal").modal("hide");
              window.location.href = "<?php echo site_url(); ?>Datacapture/index";
            });
        }else{
          alert("Quantity Manual Kosong Harap Di isi !");
        }
    });
</script>
<!-- script reject dan update -->

<!-- script approve -->
<!-- <script type="text/javascript">
  var SITE_URL = "<?php echo site_url() ?>";
  function approve(idapp){
      // alert(id);
        console.log(idapp);

        var req1 = $.ajax({
          url : SITE_URL + "Datacapture/app",
          method : "GET",
          async : false,
          cache : false,
          data   : {
              idapp : idapp
          }
        });

        req1.done(function(resp1){
              var obj1 = JSON.parse(resp1);
              $("#qmachine").val(obj1.QUANTITY_MACHINE);
              $("#qmanual").val(obj1.QUANTITY_MANUAL);
              $("#APP_ID").val(obj1.ID);
        });
      }
</script> -->

<!-- <script type="text/javascript">
  $('.approve').click(function(e) {
      e.preventDefault();
      var idapp = $(this).attr('data-id');
      console.log(idapp)
      $.ajax({
       url : "<?php echo site_url(); ?>Datacapture/dataApp",
      type : "get",
      // data : {
      //   idapp : idapp
      // }

      });
  });

</script> -->
<!-- script approve -->
               