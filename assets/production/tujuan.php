              <!-- Koneksi php ke oracle -->

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

              // Value isi SHIFT
              $query1="SELECT DISTINCT SHIFT from SUJ_INV_INTERFACE_COAL_RS order by SHIFT asc";
              $hasil1 = oci_parse($conn, $query1);
              oci_execute($hasil1);

              $query2="SELECT DISTINCT ITEM_CODE from SUJ_INV_INTERFACE_COAL_RS order by ITEM_CODE asc";
              $hasil2 = oci_parse($conn, $query2);
              oci_execute($hasil2);

              // $query3="SELECT DISTINCT QUANTITY_MACHINE from SUJ_INV_INTERFACE_COAL_RS order by QUANTITY_MACHINE asc";
              // $hasil3 = oci_parse($conn, $query3);
              // oci_execute($hasil3);


              // $defaultValue = '';
              // Search Data
              $data ='';
              if(isset($_POST['search'])){
                $item_code = $_POST['ITEM_CODE'];
                $shift = $_POST['SHIFT'];
                $tanggal = $_POST['TRANSACTION_DATE'];  
                $coba ="SELECT QUANTITY_MACHINE FROM SUJ_INV_INTERFACE_COAL_RS WHERE TRANSACTION_DATE='$tanggal' AND ITEM_CODE like '%".$item_code."%' AND SHIFT LIKE '%".$shift."%'";
                  }else{
                   $coba="SELECT 0 from dual";
                  }
                $stid = oci_parse($conn,$coba);
                oci_execute($stid);
                $data=oci_fetch_row($stid);
              
              ?>

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
    <!-- jQuery custom content scroller -->
    <link href="../vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet"/>
        <!-- Datatables -->
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap-datetimepicker -->
    <link href="../vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
    <link href="../vendors/bootstrap-datepicker/datepicker.css" rel="stylesheet">
        <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- Date Time Picker Master -->
    <link href="../vendors/datetimepicker-master/build/jquery.datetimepicker.min.css" rel="stylesheet">


    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md footer_fixed">
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
            </div>
            <!-- /menu profile quick info -->

            <!-- KONEKSI PHP KE ORACLE -->
    

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

                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
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
                  <div class="x_content">
                    <div class="row filter-block">

            <div class="col-md-6 col-sm-6 col-xs-6">
              <form name="form1" method="post" action="">
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tipe">Item Code</label>
                    <div class="col-md-9 col-sm-9 col-xs-12 item">
                    <select id="ITEM_CODE" name="ITEM_CODE"  class="form-control col-md-7 col-xs-12">
                    <option value="">- Pilih Type -</option>
                      <?php   while($rows2=oci_fetch_array($hasil2)){?>
                      <option><?php echo $rows2['ITEM_CODE']; ?></option><?php } ?>

                    </select>
                    </div>
                <div class="clearfix"></div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tanggal">Tanggal</label>
                  <div class="col-md-9 col-sm-9 col-xs-12 item has-feedback">
                    <input type="text" id="TRANSACTION_DATE" name="TRANSACTION_DATE" maxlength="10" required="required" class="form-control col-md-7 col-xs-12 dtpicker has-feedback-left" />
                      <span class="glyphicon glyphicon-calendar form-control-feedback left" aria-hidden="true"></span>
                  </div>
                <div class="clearfix"></div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tipe">Shift</label>
                <div class="col-md-9 col-sm-9 col-xs-12 item">
                <select id="SHIFT" name="SHIFT" class="form-control col-md-7 col-xs-12">
                <option value="">- SHIFT -</option>
                <?php while($rows1=oci_fetch_array($hasil1)){?>
                <option><?php echo $rows1['SHIFT']; ?></option><?php } ?>


              </select>
                </div>
              <div class="clearfix"></div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Quantity Machine</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" name="QUANTITY_MACHINE" id="QUANTITY_MACHINE" class="form-control" value="<?=  $data[0] ?>">
                  <!-- <?=  $data['QUANTITY_MACHINE'] ?> -->
                </div>
            </div>
              <div class="clearfix"></div>

              </div>
                  <div class="clearfix"></div>
                  <div class="separator"></div>
              </div>
    <div class="">
      <input class="btn btn-success btn-sm" title="Approve Data" id="approve" name="approve" type="submit" value="approve" method="post" ></input>
      &emsp;&emsp;&emsp;&emsp;
      <input class="btn btn-danger btn-sm" title="Reject Data" name="reject" type="submit" id="'.$rows['ID'].'" value="Reject" method="post" data-toggle = "modal" data-target = "#myModal" ></input>
      &emsp;&emsp;&emsp;&emsp;
      <input class="btn btn-primary btn-sm" title="Search Data" name="search" type="submit" value="Search" id="search" method="post" ></input>
    </div>
  </form>
    <div class="separator"></div>

                    </table>
  <!-- Modal -->
<div class = "modal fade" id = "myModal" tabindex = "-1" role = "dialog" 
   aria-labelledby = "myModalLabel" aria-hidden = "true">
   
   <div class = "modal-dialog">
      <div class = "modal-content">
         
         <div class = "modal-header">
            <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
                  &times;
            </button>
            
            <h4 class = "modal-title" id = "myModalLabel">
               Reject Data In Here
            </h4>
         </div>
         
         <div class = "modal-body">
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tipe">Item Code</label>
                    <div class="col-md-9 col-sm-9 col-xs-12 item">
                     <input type="text" name="#" class="form-control" value="">
                    </div>
                <div class="clearfix"></div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tanggal">Tanggal</label>
                  <div class="col-md-9 col-sm-9 col-xs-12 item has-feedback">
                    <input type="text" id="DATE" name="DATE" maxlength="10" required="required" class="form-control col-md-7 col-xs-12 dtpicker has-feedback-left" />
                      <span class="glyphicon glyphicon-calendar form-control-feedback left" aria-hidden="true"></span>
                  </div>
                <div class="clearfix"></div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tipe">Shift</label>
                <div class="col-md-9 col-sm-9 col-xs-12 item">
                 <input type="text" name="#" class="form-control" value="">
                </div>
              <div class="clearfix"></div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Quantity Machine</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" name="#" class="form-control" value="">
                </div>
            </div>
         </div>
         <div class="clearfix"></div>
         <br>
         
         <div class = "modal-footer">
            <button type = "button" class = "btn btn-default" data-dismiss = "modal">
               Close
            </button>
            
            <button type = "button" class = "btn btn-primary">
               Submit changes
            </button>
         </div>
         
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
  
</div><!-- /.modal -->
                  </div>
                </div>
              </div>
            </div>

        <!-- /page content -->

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- jQuery custom content scroller -->
    <script src="../vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-datetimepicker -->    
    <script src="../vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
    <script src="../vendors/moment/min/moment.min.js"></script>
    <!-- Date Time Picker Master -->
    <script src="../vendors/datetimepicker-master/build/jquery.datetimepicker.full.min.js"></script>
    <script src="../vendors/datetimepicker-master/build/jquery.datetimepicker.full.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
    <script type="text/javascript">
    function doSearch(){
    if (typeof datatable!='undefined') datatable.fnDestroy();
    initDataTable();
    //datatable.DataTable().draw();
  }
  function clearSearch(){
    $('#ITEM_CODE').val('');
    $('#SHIFT').val('');
    doSearch();
  }
        $(document).ready(function() {
                var t = $('#myTable').DataTable( {
            "columnDefs": [ {
                "searchable": false,
                "orderable": false,
                "targets": 0,
                "scrollX": true
            } ],
            "order": [[ 1, 'asc' ]]
        } );
                
                t.on( 'order.dt search.dt', function () {
                    t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                        cell.innerHTML = i+1;
                    } );
                } ).draw();
            } );
$('#TRANSACTION_DATE').datetimepicker({
        format: 'd-M-y'
    });
$('#DATE').datetimepicker({
        format: 'd-M-y'
    });
    </script>
    
<script type="text/javascript">
    $(document).ready(function(){
    // yang bawah ini bekerja jika tombol lihat data (class="view_data") di klik
    $('.view_data').click(function(){
      // membuat variabel id, nilainya dari attribut id pada button
      // id="'.$row['id'].'" -> data id dari database ya sob, jadi dinamis nanti id nya
      var id = $(this).attr("id");
      
      // memulai ajax
      $.ajax({
        url: 'view.php',  // set url -> ini file yang menyimpan query tampil detail data siswa
        method: 'post',   // method -> metodenya pakai post. Tahu kan post? gak tahu? browsing aja :)
        data: {id:id},    // nah ini datanya -> {id:id} = berarti menyimpan data post id yang nilainya dari = var id = $(this).attr("id");
        success:function(data){   // kode dibawah ini jalan kalau sukses
          $('#data_siswa').html(data);  // mengisi konten dari -> <div class="modal-body" id="data_siswa">
          $('#myModal').modal("show");  // menampilkan dialog modal nya
        }
      });
    });
  });
  </script>

  <script>
        $(function(){
            $(document).on('click','.edit-record',function(e){
                e.preventDefault();
                $("#myModal").modal('show');
                $.post('coba.php',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
        });
    </script>
  </body>
</html>