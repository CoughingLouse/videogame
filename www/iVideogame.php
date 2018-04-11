<?php
  header("Content-Type: application/json; charset=UTF-8");
  // PARAMETRI DI CONNESSIONE AL DB
  $servername = "localhost";
  $username = "rjko";
  $password = "";
  $dbname = "my_rjko";
  // COSTANTI
  define('READ','SELECT ID_VG AS ID,TITOLO,VALORE AS FORMATO,SPECIALE,DOVE FROM VG,VG_FORMATO WHERE ID_FORMATO=FK_ID_FORMATO ORDER BY ID_VG;');
  define('SWAP','UPDATE VG SET DOVE=#DOVE# WHERE ID_VG=#ID#;');
  define('CREATE','INSERT INTO VG("TITOLO","FK_ID_FORMATO","SPECIALE","DOVE") VALUES(#V1#,#V2#,#V3#,#V4#);');

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  $op = $_GET["op"];
  switch($op)
  {
    case "C": break;
    case "R": doRead($conn); break;
    case "U": break;
    case "D": break;
    default: doRead($conn);
  }

  // OPERAZIONI
  function doRead($conn)
  {
    $result = $conn->query( READ );
    $result_arr = array();

    if ($result->num_rows > 0)
    {
      while($row = $result->fetch_assoc()) {
        $result_arr[] = $row;
      }
      echo json_encode($result_arr, JSON_NUMERIC_CHECK);
    }
    else
        echo 'EMPTY RESULT';

    $conn->close();
  }

?>
