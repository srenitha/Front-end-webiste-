<html>

<body>
  <form name="testform" method='POST'>
    <?php

$dbhost_name = "localhost"; // Your host name 
$database = "joshkosh-final-2018";       // Your database name
$username = "547bf2d76c50";            // Your login userid 
$password = "f02cc545307b5abe";            // Your password 

try {
  $dbo = new PDO('mysql:host='.$dbhost_name.';dbname='.$database, $username, $password);
} catch (PDOException $e) {
  print "Error!: " . $e->getMessage() . "<br/>";
  die();
}


$sql="select * from category "; // Query to collect data from table 

foreach ($dbo->query($sql) as $row) {
  echo $row['category'];
  echo "</br>";

}
?>
</body>

</html>