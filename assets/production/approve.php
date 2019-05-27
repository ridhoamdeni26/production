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
      //if(isset($_POST['approve'])){
      //query untuk menampilkan hasil dari ID

      $id = $_POST['idx'];
      $query5 = "SELECT * FROM SUJ_INV_INTERFACE_COAL_RS WHERE ID='$id' ";
      $hasil5 = oci_parse($conn, $query5);
      oci_execute($hasil5);
      //var_dump($hasil5);
      while($rows3=oci_fetch_array($hasil5)){ 

         $query6="INSERT INTO SUJ_INV_INTERFACE_COAL_RS_2 SELECT * FROM SUJ_INV_INTERFACE_COAL_RS WHERE ID='$id'";
         $hasil6 = oci_parse($conn, $query6);
         oci_execute($hasil6);
         
         
         $query7="UPDATE SUJ_INV_INTERFACE_COAL_RS_2 SET FLAG ='1', USER_APPROVE = 'User', STATUS = 'APPROVE' WHERE ID='$id'";
         $hasil7 = oci_parse($conn, $query7);
         oci_execute($hasil7);


         echo "APPROVE DATA BERHASIL";
      };
?>
<script>
if ( $("#id_input_approve").val().trim() == 0 || $("#id_input_approve").val().trim() == '') {
alert('Masukkan quantity');
e.preventDefault();
}
</script>