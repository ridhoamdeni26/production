<div class="">
        <div class="page-title">
          <div class="title_left">
            <h3>DATA SUJ</small></h3>
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

            <div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div>

<a href='#addModal' id="addmodal" class='btn btn-success' data-toggle='modal' >Tambah Data</a>
<br>
<br>
<table id="myTable" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Lengkap</th>
              <th>Username</th>
              <th>Level User</th>
              <th>Status</th>
              <th>Aksi</th>

            </tr>
          </thead>
            <tbody>
          <?php
            $no = 1;
            foreach($result as $row) {
            ?>     
            <tr>
              <td></td>
              <td><?php echo $row->nama_lengkap; ?></td>
              <td><?php echo $row->username; ?></td>
              <td><?php echo $row->nama_level; ?></td>
              <td>
                <?php
                  if ($row->status == 'active'){
                   echo "<i class='btn btn-default fa fa-check'>".$row->status."<i>";
                  }else{
                    echo "<i class='btn btn-default fa fa-close'>".$row->status."<i>";
                  } ?>
                 
                </td>
              <td>
                <a href='#editModal' id="editmodal" class='btn btn-primary glyphicon glyphicon-edit' data-toggle='modal'onClick="editmodal(<?php echo $row->id_user;?>)"></a>
              </td>
            </tr>
            <?php
                  $no++; }
                ?> 
          </tbody>
        </table>

<!-- Pop Up Add Modal -->
<form action="<?php echo base_url(). 'Management/add'; ?>" method="post">
      <div class="modal fade" id="addModal" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Tambah Data</h4>
            </div>  
          <div class="modal-body">

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Lengkap<span class="required"></label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" id="nama_lengkap" name="nama_lengkap" required="required" class="form-control" required="required">
                </div>
            </div>
           <div class="clearfix"></div>
           <br>

           <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Username<span class="required"></label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" id="username" name="username" class="form-control" required="required" value="">
                </div>
            </div>
           <div class="clearfix"></div>
           <br>

           <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Password<span class="required"></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="password" id="password" name="password" required="required" class="form-control" value="">
                </div>
            </div>
           <div class="clearfix"></div>
           <br>

           <div class="item form-group">
              <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Ulangi Password</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="password2" type="password" name="confirm_password" data-validate-linked="password" class="form-control col-md-7 col-xs-12" required="required">
                </div>
            </div>
            <div class="clearfix"></div>
           <br>

           <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tipe">ID Level User</label>
              <div class="col-md-9 col-sm-9 col-xs-12 item">
              <select id="id_level" required="required" name="id_level" style= "width:142px; height:35px">
                <option value="1">Admin</option>
                <option value="2">User Molasses</option>
                <option value="3">User Raw Sugar</option>
                <option value="4">User Coal</option>
              </select>
              </div>
            <div class="clearfix"></div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tipe">Status User</label>
              <div class="col-md-9 col-sm-9 col-xs-12 item">
              <select id="status" name="status" required="required" style= "width:142px; height:35px">
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
              </select>
              </div>
            <div class="clearfix"></div>
          </div>

           <div class="modal-footer">
           <button class="btn btn-primary" id="tambah" type="submit">Tambah Data</button>
           <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
            </div>
          </form>
          </div>
          </div>
        </div>
      </div>

<!-- Pop Up Edit Modal -->
      <div class="modal fade" id="editModal" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Edit Data</h4>
            </div>  
          <div class="modal-body">

            <div class="form-group">
              <input type="hidden" id="UP_ID">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Lengkap<span class="required"></label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" id="NAMA_LENGKAP" name="NAMA_LENGKAP" required="required" class="form-control" value="" >
                </div>
            </div>
           <div class="clearfix"></div>
           <br>

           <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Username<span class="required"></label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" id="USERNAME" name="USERNAME" required="required" readonly="readonly" class="form-control" value="">
                </div>
            </div>
           <div class="clearfix"></div>
           <br>

           <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Password<span class="required"></label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="password" id="PASSWORD" name="PASSWORD" required="required" class="form-control" value="">
                </div>
            </div>
           <div class="clearfix"></div>
           <br>

         <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Ulangi Password<span class="required"></label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="password" id="CONFIRM" name="CONFIRM" data-validate-linked="PASSWORD" required="required" class="form-control" value="">
                </div>
            </div>
           <div class="clearfix"></div>
          <br>

           <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tipe">ID Level User</label>
              <div class="col-md-9 col-sm-9 col-xs-12 item">
              <select id="ID_LEVEL" name="ID_LEVEL" style= "width:142px; height:35px">
                <option value="1">Admin</option>
                <option value="2">User Molasses</option>
                <option value="3">User Raw Sugar</option>
                <option value="4">User Coal</option>
              </select>
              </div>
            <div class="clearfix"></div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tipe">Status</label>
              <div class="col-md-9 col-sm-9 col-xs-12 item">
              <select id="STATUS" name="STATUS" style= "width:142px; height:35px">
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
              </select>
              </div>
            <div class="clearfix"></div>
          </div>

           <div class="modal-footer">
           <button class="btn btn-primary" id="submitedit" type="submit">Update Data</button>
           <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
            </div>
          </div>
          </div>
        </div>
      </div>

      </div>
    </div>
  </div>
</div>
<!-- validator -->
<script src="../vendors/validator/validator.js"></script>
<!-- Parsley -->
<script src="../vendors/parsleyjs/dist/parsley.min.js"></script>
<script>
  var SITE_URL = "<?php echo site_url() ?>";
  function editmodal(id){
      //alert(id);
        console.log(id);

        var req = $.ajax({
          url : SITE_URL + "Management/edit",
          method : "GET",
          async : false,
          cache : false,
          data   : {
              id : id
          }
        });

        req.done(function(resp){
              var obj = JSON.parse(resp);
              $("#NAMA_LENGKAP").val(obj.nama_lengkap);
              $("#USERNAME").val(obj.username);
              $("#ID_LEVEL").val(obj.id_level_user);
              $("#UP_ID").val(obj.id_user);
              $("#STATUS").val(obj.status);
              // console.log(obj.id_user);
        });
       
    }

    //pakai event listner untuk manggil event click
    document.getElementById('submitedit').addEventListener('click',function(e){
      // console.log(submitedit);
        var NAMA_LENGKAP = document.getElementById('NAMA_LENGKAP').value;
        var USERNAME = document.getElementById('USERNAME').value;
        var PASSWORD = document.getElementById('PASSWORD').value;
        var CONFRIM = document.getElementById('CONFIRM').value;
        var ID_LEVEL_USER = document.getElementById('ID_LEVEL').value;
        var STATUS = document.getElementById('STATUS').value;
        //di check apakahqty terinput
            //proses 
            var proses = $.ajax({
              url : SITE_URL + "Management/ubah",
              async : false,
              cache : false,
              method : "POST",
              data : {
                  NL : NAMA_LENGKAP,
                  UN : USERNAME,
                  PS : PASSWORD,
                  CONF : CONFRIM,
                  LEVEL : ID_LEVEL_USER,
                  ST : STATUS,
                  ID : document.getElementById('UP_ID').value
              }
            });
            // console.log(data);

            proses.done(function(msg){
              console.log(msg);
              $("#editModal").modal("hide");
              window.location.href = "<?php echo site_url(); ?>Management/index";
            });
        });
</script>

