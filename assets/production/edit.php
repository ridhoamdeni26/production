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


        if(isset($_POST['idx'])){
        $id = $_POST['idx'];
        // mengambil data berdasarkan id
        $query3 = "SELECT * FROM SUJ_INV_INTERFACE_COAL_RS WHERE ID='$id' ";
        $hasil3 = oci_parse($conn, $query3);
        oci_execute($hasil3);
      }
        while($rows3=oci_fetch_array($hasil3)){ ?>
        
        <!-- Membuat Form Di Modal -->
        <form action="update.php" method="post" >
          <input type="hidden" name="ID" value=" <?php echo $rows3['ID']; ?> " >
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Quantity Machine</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" name="quantity_machine" readonly="readonly" class="form-control" value="<?php echo $rows3['QUANTITY_MACHINE']; ?>">
                </div>
            </div>
           <div class="clearfix"></div>
           <br>

           <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Quantity Manual</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" name="quantity_manual" class="form-control" value="<?php echo $rows3['QUANTITY_MANUAL']; ?>">
                </div>
            </div>
           <div class="clearfix"></div>
           <br>

           <div class="modal-footer">
           <button class="btn btn-primary" type="submit">Update</button>
           <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
            </div>
           
          </form>

        <?php 
        }

   
?>
<script>
  $("form").submit(function( e ){
    if ( $("input[name='quantity_manual']").val().trim() == 0 || $("input[name='quantity_manual']").val().trim() == '') {
alert('Masukkan quantity');
e.preventDefault();
}

  })
</script>

<!-- <script>
if ( $("#id_input_approve").val().trim() == 0 || $("#id_input_approve").val().trim() == '') {
alert('Masukkan quantity');
e.preventDefault();
}
</script> -->