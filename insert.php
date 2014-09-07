<?php
$con=mysqli_connect("localhost","hrishi","robin","webservice");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$n = $_POST['name'];
$v = $_POST['value'];
mysqli_query($con,"INSERT INTO name_value (name, value)
VALUES ('$n', '$v')");
$output['success'] = "1";
mysqli_close($con);
print(json_encode($output));
//echo "YO DONE"
?> 