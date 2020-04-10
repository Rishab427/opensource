<!DOCTYPE html>
 
<head>
	<title>Calculate Electricity Bill</title>
</head>
 
<?php
$result_str = $result = '';
$hel='';
$hel1=$Rate=$Rate1=$Rate2=$Rate3=$f = '';
if (isset($_POST['unit-submit'])) {
    $units = $_POST['units'];
    if (!empty($units)) {
        $result = calculate_bill($units);
        $hel = "-----------------------------------------------------------Your Bill Has been Caluclated-----------------------------------------------------------";
        
        $Rate ="**********************Bill Has been Calculate as per the following rates :********************** ";
        $Rate1 = "For The First 50 Units It Has Been Charged ₹9 per Unit ";
        $Rate2 = "For The Next 50 Units It Has Been Charged ₹12 per Unit ";
        $Rate3 = "And After 100 units It Has Been Charged ₹15 per Unit";
        $hel1 = "Your Bill Details For $units units are : ";
        $f =  "           Thank You , And Please Pay Your Bill On Time -)";
        $result_str = 'Total amount of ' . $units . ' Unit Is'.'  ========  '.'₹ ' . $result;
    }
}
function calculate_bill($units) {
    $first = 9.00;
    $second = 12.00;
    $third = 15.00;
 
    if($units <= 50) {
        $bill = $units * $first;
    }
    else if($units > 50 && $units <= 100) {
        $temp = 50 * $first;
        $remaining_units = $units - 50;
        $bill = $temp + ($remaining_units * $second);
    }
    else if($units > 100 ) {
        $temp = (50 * $first) + (50 * $second);
        $remaining_units = $units - 100;
        $bill = $temp + ($remaining_units * $third);
    }
    
    return number_format((float)$bill, 2, '.', '');
}
 
?>
<style>
body
    {
        background-image:url("bulb2.jpg");
        background-size: 1420px 720px;
        background-repeat: no-repeat;
        font-size: 140%;
    }
    h1 {
            text-shadow: 0 0 3px #FF0000;
        }
    
</style>


 
<body>
	<div id="page-wrap">
		<h1 style="color:maroon;"><center><marquee><b>Welcome To Calculate Electricity Bill</b></center></marquee></h1>
		<form action="" method="post" id="quiz-form">            
            	<input type="number" name="units" id="units" placeholder="Enter no. of Units"  />            
            	<input type="submit" name="unit-submit" id="unit-submit" value="Submit" />		
		</form>
        
		<div>
            <?php 
            echo "<br />";
            
            echo "<br />";
            echo "<b><i>$Rate</i><b>";
            echo "<br />";
            echo "<b><i>$Rate1</i><b>";
            echo "<br />";
            echo "<b><i>$Rate2</i><b>";
            echo "<br />";
            echo "<b><i>$Rate3</i><b>";
            echo "<br />";
            echo "<br />";
            echo "<br />";
            echo "<b><i>$hel</i><b>";
            echo "<br />";
            echo "<b><i>$hel1</i><b>";
            echo "<br />";
            echo "<b><i>$result_str</i><b>";
            echo "<br />";
            echo "<br />";
            echo "<br />";
            echo "<br />";
            echo "<br />";
            echo "<b><i><center>$f</center></i><b>";
            ?>
            
		</div>	
	</div>
</body>
</html>