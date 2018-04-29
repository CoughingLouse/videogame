<?php
  header("Content-Type: application/json; charset=UTF-8");
  // FUNZIONE DI CONNESSIONE AL DB
  function db_connect() {
    // Define connection as a static variable, to avoid connecting more than once
    static $connection;
    // Try and connect to the database, if a connection has not been established yet
    if(!isset($connection)) {
      // Load configuration as an array. Use the actual location of your configuration file
      $config = parse_ini_file('_config.ini');
      $connection = mysqli_connect($config['servername'],$config['username'],$config['password'],$config['dbname']);
    }
    // If connection was not successful, handle the error
    if($connection === false) {
      // Handle error - notify administrator, log to a file, show an error screen, etc.
      return mysqli_connect_error();
    }
    return $connection;
  }
  // Connect to the database
  $conn = db_connect();
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // COSTANTI
  define('READ','SELECT ID_VG AS ID,TITOLO,VALORE AS FORMATO,SPECIALE,DOVE FROM VG,VG_FORMATO WHERE ID_FORMATO=FK_ID_FORMATO ORDER BY ID_VG;');
  define('SWAP','UPDATE VG SET DOVE=#DOVE# WHERE ID_VG=#ID#;');
  define('CREATE','INSERT INTO VG("TITOLO","FK_ID_FORMATO","SPECIALE","DOVE") VALUES(#V1#,#V2#,#V3#,#V4#);');

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
    else {
      echo 'EMPTY RESULT';
    }

    $conn->close();
  }

?>
