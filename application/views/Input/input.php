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

              <form action="<?php echo base_url(). 'inputdata/search'; ?>" method="post">
                
                <!-- pembuatan form validation data -->
                  <?php if(validation_errors() != false) { ?>
                  <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <?php echo validation_errors(); ?>
                  </div>
                   <?php } ?>
                <div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tanggal">Tanggal</label>
                  <div class="col-md-6 col-sm-6 col-xs-12 item has-feedback">
                    <input type="text" id="TRANSACTION_DATE" name="TRANSACTION_DATE" maxlength="10" required="required" class="form-control col-md-7 col-xs-12 dtpicker has-feedback-left" value="" placeholder="Date" />
                      <span class="glyphicon glyphicon-calendar form-control-feedback left" aria-hidden="true"></span>
                  </div>
                <div class="clearfix"></div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tipe">Shift</label>
                <div class="col-md-2">
                  <select style= "width:120px; height:35px"  id="SHIFT">
                      
                    <option value="">1</option>
                    <option value="">2</option>
                    <option value="">3</option>
                    
                  </select>
              </div>
                    <div class="clearfix"></div>
                  </div>

              </div>
                  <div class="clearfix"></div>
                  <div class="separator"></div>


    <div class="">
      &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
      <input class="btn btn-primary btn-sm "  title="Search Data" type="submit" value="Search Data" method="post" ></input>
    </div>
  </form>
 <!--  </form> -->
    <div class="separator"></div>
</div>

<!--  <div class="col-md-6 col-sm-6 col-xs-6"> -->
<table id="myTable" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>No</th>
              <th>TransDate</th>
              <th>CreateDate</th>
              <th>Shift</th>
            </tr>
          </thead>
            <tbody>
          <?php
            $no = 1;
            foreach($db as $row) {
            ?>     
            <tr>
              <td></td>
              <td><?php echo $row->TransDate; ?></td>
              <td><?php echo $row->CreateDate; ?></td>
              <td><?php echo $row->Shift; ?></td>
            </tr>
            <?php
                  $no++; }
                ?> 
          </tbody>

<!-- <div class="clearfix"></div>
 <div class="col-md-6 col-sm-6 col-xs-6">
<table id="myTable1" class="table table-striped table-bordered col-md-6 col-sm-6 col-xs-6">
          <thead>
            <tr>
              <th>No</th>
              <th>TransDate</th>
              <th>CreateDate</th>
            </tr>
          </thead>
            <tbody>
          <?php
            $no = 1;
            foreach($oracle as $row) {
            ?>     
            <tr>
              <td></td>
              <td><?php echo $row->TransDate; ?></td>
              <td><?php echo $row->CreateDate; ?></td>
            </tr>
            <?php
                  $no++; }
                ?> 
          </tbody> -->