<?php
$con=mysqli_connect(localhost,"root","cfg2014!","recipe");

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM Menu m, Ingredients i where m.ingCode = i.ingCode");
while($row = mysqli_fetch_array($result)) {
    if($row['Qty'] > $row['qTy'])
  		$freq[$row['menCode']]++;
  	//echo $row['menCode']." Recipe:".$['menName']." Store:".$row['Qty']." Available:".$row['qTy'];

	else{
		$temp = $row['qTy'] -  $row['qty'];
		$resultSub = mysqli_query($con,"SELECT * FROM Substitute s, Ingredients j where s.ingCode = j.ingCode and j.qty >= '$temp'");
	 	while($innerRow = mysqli_fetch_array($resultSub)){
	 		$freq[$row['menCode']]++;
	    }
	}
}

arsort($freq);
echo "<form method="post" action="/RecordSaver.php">";
foreach ($freq as $key => $value) {
	$resultFinal = mysqli_query($con,"SELECT * FROM Menu where menCode = '$key'");
	while($final = mysqli_fetch_array($resultFinal))
	{
			echo "<input type="checkbox" id="menCode"/>".$final['menCode'];
			echo "<input type="checkbox" id="MenName"/>".$final['menName'];
	 	break;
	}
	echo "</form>";
	$count++;
	if($count >= 5)
		break;
}
mysqli_close($con);
?>
