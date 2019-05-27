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


            // nangkep parameter dari edit.php
            $id = $_POST['ID'];
            $qtml = $_POST['quantity_manual'];

            // buat query update
            $query4 = "UPDATE SUJ_INV_INTERFACE_COAL_RS SET QUANTITY_MANUAL = '$qtml' WHERE ID='$id'";
            $hasil4 = oci_parse($conn, $query4);
            oci_execute($hasil4);
            if( !$hasil4 ){
                  echo "
                  <script>
                    alert('Data Gagal Di Perbarui !');
                    document.location.href = 'capture.php';
                  </script>

                  ";
                }else {
                  echo "
                  <script>
                    alert('Data Berhasil Di Perbarui !');
                    document.location.href = 'capture.php';
                  </script>
                  ";
                }
        ?>