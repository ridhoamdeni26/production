<div class="">
        <div class="page-title">
          <div class="title_left">
            <h3>DATA SUJ</small></h3>
          </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>Entry Data Molasses</h2>
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

        <!-- pembuatan form validation data -->
              <?php if(validation_errors() != false) { ?>
              <div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <?php echo validation_errors(); ?>
              </div>
               <?php } ?>

            <div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div>

          <!--
          <form action="<?php echo base_url(). 'EntryMol/searchmol'; ?>" method="post">
          -->
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tanggal">Tanggal</label>
              <div class="col-md-6 col-sm-6 col-xs-12 item has-feedback">
                <input type="text" id="TRANSACTION_DATE" name="TRANSACTION_DATE" maxlength="10" required="required" class="form-control col-md-7 col-xs-12 dtpicker has-feedback-left" value="" placeholder="Masukan Tanggal" />
                  <span class="glyphicon glyphicon-calendar form-control-feedback left" aria-hidden="true"></span>
              </div>
            <div class="clearfix"></div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tipe">Shift</label>
            <div class="col-md-9 col-sm-9 col-xs-12 item">
            <select class="glyphicon glyphicon-time" id="SHIFT" name="SHIFT" style= "width:142px; height:35px">
              <option value="1">1 (00.00 - 08.00) </option>
              <option value="2">2 (08-00 - 16.00) </option>
              <option value="3">3 (16.00 - 00.00) </option>
            </select>
            </div>
          <div class="clearfix"></div>
        </div>



<!--           <div class="col-md-6 col-sm-6 col-xs-6">

        <input type="text" id="shift_1" name="shift_1" value="<?php if(!empty($data)) { echo $shift; } ?> ">
          <input type="text" id="tanggal" name="tanggal" value="<?php if(!empty($data)) { $newDate = date("m/d/Y", strtotime($date)); echo $newDate; } ?>">

         <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tanggal">Total Quantity</label>
                <div class="col-md-6 col-sm-6 col-xs-12 item has-feedback">
                  <input type="text" id="Total_Quantity1" name="Total_Quantity1" value="<?php if(!empty($data)) { echo $total->Qty; } ?>">

                </div>
              <div class="clearfix"></div>
              <br>
          </div> -->

          <!-- <div class="col-md-6 col-sm-6 col-xs-4"> -->
<!--               <a href="approve" class="btn btn-round btn-success approve" type="submit" >Approve</a>
          <a href='#myModal' id="reject" class='btn btn-round btn-danger' data-toggle='modal' onClick="">Reject</a>
        </div> -->

              <!-- <div class="clearfix"></div> -->
              <!-- <div class="separator"></div> -->

  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
  <input class="btn btn-primary btn-sm" id="search" name="search" title="Search Data" type="submit" value="Search Data" method="post" onClick="search" ></input>
</div>
    <!--
     </form>
   -->
   <br>

        <div class="col-md-6 col-sm-6 col-xs-6">
         <form action="<?php echo base_url(). 'EntryMol/approve'; ?>" method="post">

          <input type="text" id="shift_1" name="shift_1" value="<?php if(!empty($data)) { echo $shift; } ?>">
          <input type="text" id="tanggal" name="tanggal" value="<?php if(!empty($data)) { $newDate = date("m/d/Y", strtotime($date)); echo $newDate; } ?>">
         <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tanggal">Total Quantity</label>
                <div class="col-md-6 col-sm-6 col-xs-12 item has-feedback">
                  <input type="text" id="Total_Quantity1" name="Total_Quantity1" readonly="readonly" value="<?php if(!empty($data)) { echo $total->Qty; } ?>">

                </div>
              <div class="clearfix"></div>
              <br>
          </div>

          <!-- <div class="col-md-6 col-sm-6 col-xs-4"> -->
          <input class="btn btn-round btn-success approve" type="submit" value="approve" ></input>
          <a href='#myModal' id="reject" class='btn btn-round btn-danger' data-toggle='modal' onClick="">Reject</a>
       <!--  </form> -->
        </form>
      </div>
          <br>

            <div class="clearfix"></div>
            <div class="separator"></div>

 <div class="col-md-6 col-sm-6 col-xs-6">

<div id="tableData">
    <table style="width: 500px" border="1" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th>Shift</th>
                <th>Jam</th>
                <th>Qty</th>
            </tr>
        </thead>
        <tbody></tbody>
        <tfoot>
            <tr>
                <td colspan="2">Subtotal</td>
                <td style="text-align: right"><span id="subtotal"></span></td>
            </tr>
        </tfoot>
    </table>
</div>

<!-- Pop Up Modal Reject -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Detail Data</h4>
        </div>
      <div class="modal-body">

        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Quantity Reject</label>
            <div class="col-md-9 col-sm-9 col-xs-12">
              <input type="text" id="totalqty" value="<?php if(!empty($data)) { echo $total->Qty; }else{echo "0";}  ?>" class="form-control" value="">
            </div>
        </div>
       <div class="clearfix"></div>
       <br>

       <label class="control-label col-md-3 col-sm-3 col-xs-12" for="message">Keterangan :</label>
        <textarea id="message" required="required" class="form-control col-md-3 col-sm-3 col-xs-12 " name="message" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-validation-threshold="10"></textarea>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
// $(document).ready(function(){

//     $("#search").click(function(){

//       var total_qty = $('#total_qty').val();
//       if(total_qty != '')
//        console.log(total_qty);
// {
//  $('#Total_Quantity').load("<?php echo base_url(). 'Entrymol/searchmol'; ?>", {total_qty:total_qty});

// }
// else
// {
//  alert("Total Qty kosong");
// }
//       });
//     });


// $("#search").click(function(){
//     $.ajax({
//     type: 'GET',
//     url: '<?php echo base_url(). 'Entrymol/searchmol'; ?>',
//     data: {total_qty: 'total_qty'},
//     dataType: 'json',
//     success: function (data) {
//            console.log(data);
//         };

// });

// var SITE_URL = "<?php echo site_url() ?>";
// function search(){
//   //alert(id);
//     console.log();

//     var req = $.ajax({
//       url : SITE_URL + "Entrymol/searchmol",
//       method : "GET",
//       async : false,
//       cache : false,
//       data   : {
//           Qty : Qty
//       }
//     });

//     req.done(function(resp){
//           var obj = JSON.parse(resp);
//           // $("#QUANTITY_MACHINE").val(obj.QUANTITY_MACHINE);
//           // $("#QUANTITY_MANUAL").val(obj.QUANTITY_MANUAL);
//           // $("#UP_ID").val(obj.ID);
//           console.log(obj.Qty);
//     });

</script>
<script type="text/javascript">
    var SITE_URL = "<?php echo site_url() ?>";
    //getData();
    
    document.getElementById('search').addEventListener('click',function(e){
        var d,shif, req;
        
        shif = document.getElementById('SHIFT').value;
        tanggal : document.getElementById('TRANSACTION_DATE').value;
        
        //parameter yg dikirim ke controller
        d = {
            shift   : shif,
            tanggal : document.getElementById('TRANSACTION_DATE').value
        }
        
        req = $.ajax({
            url : SITE_URL + "Entrymol/getData",
            method : "POST",
            async : false,
            cache : false,
            data  : d
        });
        
        req.done(function(msg){
            addTable(msg, shif);
        });
    });

    function addTable(msg, shif){
       //dihapus dahulu , agar tidak numpuk
        $(".req").remove();
        var jp = JSON.parse(msg);
        
        var html = "";
        
        var subtotal = 0;
        for(var i = 0;i < jp.length; i++){
            subtotal += Number(jp[i].qty);
            
            html += ""
                + '<tr height="20" class="req">'
                    +'<td style="text-align:center">'+shif+'</td>'
                    +'<td style="text-align:center">'+jp[i].jam+'</td>'
                    +'<td style="text-align:center">'+jp[i].qty+'</td>'
                +'</tr>';
        }

        //di append kembali
        $("#tableData").find('tbody').append(html);
        $("#subtotal").text(subtotal.toFixed(2));
    }
</script>