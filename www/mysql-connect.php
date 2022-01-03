<h4 style="text-align:center;">MySQL connection from php...
<?php

echo "Connecting to Database: $host $user $pass $db_name";
echo "<br><br>";

$conn = new mysqli($host, $user, $pass, $db_name);

echo "Connected to MySQL successfully!";
echo "<br><br>";

$res = $conn->query("Select ITEM_NAME, ITEM_DESC, ITEM_ONHAND from MOE_ITEM_T");

for ($row_no = 0; $row_no < $res->num_rows; $row_no++) {
    $res->data_seek($row_no);
    $row = $res->fetch_assoc();
    echo " Item Name = " . $row['ITEM_NAME'] . " Item Description = " . $row['ITEM_DESC'] . " Item value = " . $row['ITEM_ONHAND'];
    echo "<br>";
}

$res->close();
$conn->close();
?></h4>