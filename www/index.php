<h4 style="text-align:center;">
<img src="docker-compose.jpg">
<br><br> MySQL connection from php...
<br><br>
<?php
if(!empty($_ENV['MYSQL_HOST']))
   $host = $_ENV['MYSQL_HOST'];
else
   $host = 'moe-mysql-app';

if(!empty($_ENV['MYSQL_USER']))
   $user = $_ENV['MYSQL_USER'];
else
   $user = 'ahmed';

if(!empty($_ENV['MYSQL_PASSWORD']))
   $pass = $_ENV['MYSQL_PASSWORD'];
else
   $pass = '1234';

if(!empty($_ENV['MYSQL_DB']))
   $db_name = $_ENV['MYSQL_DB'];
else
   $db_name = 'moe_db';

echo "Connecting to Database: $host $user $pass $db_name";
echo "<br><br>";

$conn = new mysqli($host, $user, $pass, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected to MySQL successfully!";
echo "<br><br>";

$res = $conn->query("Select ITEM_NAME, ITEM_DESC, ITEM_ONHAND from MOE_ITEM_T");

for ($row_no = 0; $row_no < $res->num_rows; $row_no++) {
    $res->data_seek($row_no);
    $row = $res->fetch_assoc();
    echo " >>>>>>>>> Item Name = " . $row['ITEM_NAME'] . ">>>>>>>>>> Item Description = " . $row['ITEM_DESC'] . " >>>>>>>>> Item value = " . $row['ITEM_ONHAND'];
    echo "<br>";
}
$conn->close();
?></h4>