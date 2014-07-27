
<?php
$con=mysqli_connect(localhost,"root","cfg2014!","recipe");

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$riceWheat = 'F-RICE-03-011';
$recipe1 = 'B-MENU-03-012';
echo "<h2>The Ingredient Details</h2>";
echo "<table border='1'>
			<tr>
			<th>Ingredient Code</th>
			<th>Ingredient Name</th>
			<th>Protein</th>
			<th>Energy</th>
			<th>Cost</th>
			<th>Quantity</th>
			</tr>";
//$recipe2 = ''
$result = mysqli_query($con,"SELECT * FROM Menu m, Ingredients i where m.ingCode = i.ingCode and m.menCode = '$recipe1'");
while($row = mysqli_fetch_array($result)) {
	echo "<tr>";
	echo "<td>".$row['IngCode']."</td><td>".$row['IngName']."</td><td>".$row['Protein']."</td><td>".$row['Energy']."</td><td>".$row['Cost']."</td><td>".$row['Qty'];
	echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
