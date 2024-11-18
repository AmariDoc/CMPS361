<?php
//authentication credentials
  $host = "localhost";
  $port = "5432";
  $dbname = "NBA";
  $user = "postgres";
  $password = "1234";

//Connection String
$dsn = "pgsql:host=$host;dbname=$dbname";

try {
    //session
    $instance = new PDO($dsn, $user, $password);
   
    //Set an arror alert
    $instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //Echo messages
    echo "Successfully connected to the database";

} catch (PDOException $e) {
  echo "Connection Failed: " . $e->getMessage();
}
?>