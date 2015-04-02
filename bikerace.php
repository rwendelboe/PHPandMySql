<!DOCTYPE html> 
<!--http://cs2610.cs.usu.edu/~romankuzmin/hw10/bikerace.php -->
<html lang="en">
<head>
			<meta charset="utf-8">
        	<title>LOTOJA</title>	
			<link href="style.css" rel="stylesheet" type="text/css" />		
    	</head>
    <body>			
		<?php 

		$insertResult = "";
    	$selectResult = "";
    	$user = "romankuzmin";
    	$password = "goodg0328";
    	$database = "romankuzmin";
    	$mysqli = new mysqli("localhost", "$user", "$password", "$database");

    	if ($mysqli->connect_errno) {
        	echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    	}

		define ("MINUTESPERHOUR", 60);

		$cumulativeTime0 = "";
		$cumulativeTime1 = "";
		$cumulativeTime2 = "";
		$cumulativeTime3 = "";
		$cumulativeTime4 = "";

		$intervalTime1 = "";
		$intervalTime2 = "";
		$intervalTime3 = "";
		$intervalTime4 = "";
		$intervalTime5 = "";

		$firstname = "";
		$lastname = "";
		$firstnameError = "";
		$lastnameError = "";

		$errorMsg = ""; 
		$error0 = "";
		$error1 = "";
		$error2 = "";
		$error3 = "";
		$error4 = "";
		$numError = "";

		$overallTotal = "";

		$speed1 = "";
		$speed2 = "";
		$speed3 = "";
		$speed4 = "";
		$speed5 = "";

		$temp = 0;
		$error = false;
		$checkName = false;
		$sizeError = false;
		$byFirst = false;
		$byLast = false;
		$byOverallSpeed = false;

		if(isset($_POST['submit'])){
			if(empty($_POST['firstname'])){
				$checkName = true;
				$firstnameError = "Please Enter a First Name";
				
			}else{
				if(!ctype_alpha($_POST['firstname'])){
					$checkName = true; 
					$firstnameError = "Please enter letters only for the first name";
				}
				else{
					$firstname = htmlentities($_POST['firstname']);
					$mysqli->real_escape_string($firstname);
				}
			}
			if(empty($_POST['lastname'])){
				$checkName = true;
				$lastnameError = "Please Enter a Last Name";
				
			}else{
				if(!ctype_alpha($_POST['lastname'])){
					$checkName = true;
					$lastnameError = "Please eneter letters only for the last name";
				}
				else{
					$lastname = htmlentities($_POST['lastname']); 
					$mysqli->real_escape_string($lastname);
				}
			}


			for($i=0; $i<count($_POST['cumulativeTime']); $i++) {
			
				if(is_numeric($_POST['cumulativeTime'][$i]) && $_POST['cumulativeTime'][$i] >= 0){

					$qtyName = "cumulativeTime$i";
					$$qtyName = htmlentities($_POST['cumulativeTime'][$i]);

					if(htmlentities($_POST['cumulativeTime'][$i]) <= $temp ){
						$errorMsg = "error$i";
						$$errorMsg = "Please enter a time greater than the previous time";
						$sizeError = true;
					}
					else{
						$temp = htmlentities($_POST['cumulativeTime'][$i]);
						$mysqli->real_escape_string($temp);
					}

				}
				else{
					$error = true;
					$errorMsg = "error$i";
					$$errorMsg = "Please enter a number.";

					if(is_numeric($_POST['cumulativeTime'][$i]) == false && !empty($_POST['cumulativeTime'][$i])){
						$$errorMsg = "Letters are not allowed for time input";
					}
				}
			}

			if(!empty($cumulativeTime0) && !empty($cumulativeTime1) && !empty($cumulativeTime2) && !empty($cumulativeTime3) && !empty($cumulativeTime4) && $error == false && $firstnameError == false && $lastnameError == false && $sizeError == false ){
				$result = $mysqli ->query ("INSERT INTO racers(first, last, cumulative1, cumulative2, cumulative3, cumulative4, cumulative5) VALUES ('$firstname', '$lastname', $cumulativeTime0, $cumulativeTime1, $cumulativeTime2, $cumulativeTime3, $cumulativeTime4)");

				if($result){
        			$insertResult = "Employee Added" ;
        			$firstname = "";
        			$lastname = "";
        			$cumulativeTime0 = "";
        			$cumulativeTime1 = "";
        			$cumulativeTime2 = "";
        			$cumulativeTime3 = "";
        			$cumulativeTime4 = "";
        			
    			}else{
        			$insertResult = "Employee not Added!!";
    			} 
			}
		}
		if(isset($_POST['orderfirst'])){
			$byFirst = true;
		}
		if(isset($_POST['orderlast'])){
			$byLast = true;
		}
		if(isset($_POST['orderOverallSpeed'])){
			$byOverallSpeed = true;
		}
	
		?>

		<h1>Welcome to LOTOJA Race!!!</h1>		
		<form action="<?php echo htmlentities($_SERVER['SCRIPT_NAME']) ?>" method="post" enctype="application/x-www-form-urlencoded" name=""> 

				<div class = "first"><label for="firstname">First Name:</label><input type="text" id="firstname" value="<?php echo $firstname ?>" name="firstname" /><span><?php echo $firstnameError ?></span></div>

				<div class = "last"><label for="lastname">Last Name:</label><input type="text" id="lastname" value="<?php echo $lastname ?>" name="lastname" /><span><?php echo $lastnameError ?></span></div>

				<div class = "timeInterval"><label for="cumulativeTime1">Cumulative time 1: </label><input type="text" id="cumulativeTime1" name="cumulativeTime[]" value="<?php echo $cumulativeTime0 ?>" /><span><?php echo $error0 ?></span></div>

				<div class = "timeInterval"><label for="cumulativeTime2">Cumulative time 2: </label><input type="text" id="cumulativeTime2" name="cumulativeTime[]" value="<?php echo $cumulativeTime1 ?>" /><span><?php echo $error1?></span></div>

				<div class = "timeInterval"><label for="cumulativeTime3">Cumulative time 3: </label><input type="text" id="cumulativeTime3" name="cumulativeTime[]" value="<?php echo $cumulativeTime2 ?>" /><span><?php echo $error2 ?></span></div>

				<div class = "timeInterval"><label for="cumulativeTime4">Cumulative time 4: </label><input type="text" id="cumulativeTime4" name="cumulativeTime[]" value="<?php echo $cumulativeTime3 ?>" /><span><?php echo $error3 ?></span></div>

				<div class = "timeInterval"><label for="cumulativeTime5">Cumulative time 5: </label><input type="text" id="cumulativeTime5" name="cumulativeTime[]" value="<?php echo $cumulativeTime4 ?>" /><span><?php echo $error4 ?></span></div>
				
				<div class = "submit"><input type="submit" value="Add Racer" name="submit" /><span><?php echo $insertResult ?></span></div>
				<h3 class = "sort"> Press bellow to Order the Table By :</h3>
				<div class = "orderfirst"><input type="submit" value="First Name" name="orderfirst" /></div>
				<div class = "orderlast"><input type="submit" value="Last Name" name="orderlast" /></div>
				<div class = "orderOverallSpeed"><input type="submit" value="Overall Speed" name="orderOverallSpeed" /></div>
		</form>

				<h1> LOTOJA Racers </h1>

				<table>
            		<tr>
            			<th class="name" rowspan = "2">Name</th>
            			<th class="checkpoint1" colspan = "3">Checkpoint #1 - 44 mi </th>
            			<th class="checkpoint2" colspan = "3">Checkpoint #2 - 87 mi </th>
            			<th class="checkpoint3" colspan = "3">Checkpoint #3 - 128 mi </th>
            			<th class="checkpoint4" colspan = "3">Checkpoint #4 - 165 mi </th>
            			<th class="checkpoint5" colspan = "3">Checkpoint #5 - 207 mi </th>
            			<th class="overall" rowspan = "2">Overall Speed</th>
            		</tr>
            		<tr>
            			<th> Checkpoint time (min) </th>
            			<th> Interval time (min) </th>
            			<th> Interval speed (mph) </th>
            			<th> Checkpoint time (min) </th>
            			<th> Interval time (min) </th>
            			<th> Interval speed (mph) </th>
            			<th> Checkpoint time (min) </th>
            			<th> Interval time (min) </th>
            			<th> Interval speed (mph) </th>
            			<th> Checkpoint time (min) </th>
            			<th> Interval time (min) </th>
            			<th> Interval speed (mph) </th>
            			<th> Checkpoint time (min) </th>
            			<th> Interval time (min) </th>
            			<th> Interval speed (mph) </th>
            		</tr>
            		<?php

                	if( $byFirst == true){
                		$result = $mysqli ->query ("SELECT * FROM racers WHERE 1 ORDER BY first"); 
                	}elseif($byLast == true){
                		$result = $mysqli ->query ("SELECT * FROM racers WHERE 1 ORDER BY last"); 

                	}elseif($byOverallSpeed == true){
                		$result = $mysqli ->query ("SELECT * FROM racers WHERE 1 ORDER BY cumulative5"); 
               	 	}else{
                		$result = $mysqli ->query ("SELECT * FROM racers WHERE 1 "); 
                	}
            
                	if($result == false){
                 	   $selectResult = "There was an Error!!!";
                	}else{
           
              	 		while($row = $result -> fetch_assoc()){
               	    		echo "<tr>";
               	    		echo "<td> $row[first] $row[last] </td>";
               	    		echo "<td> $row[cumulative1] </td>";
              	    		echo "<td> $row[cumulative1] </td>";
              	    		printf(" <td> %.2f </td>",  44 / (($row['cumulative1'] - 0)/MINUTESPERHOUR));
                    		echo "<td> $row[cumulative2]</td><td>";
                    		echo  $row['cumulative2'] - $row['cumulative1'];
                    		printf("</td><td> %.2f </td>",  43 / (($row['cumulative2'] - $row['cumulative1'])/MINUTESPERHOUR));
                    		echo "<td> $row[cumulative3]</td><td>";
                    		echo  $row['cumulative3'] - $row['cumulative2'];
                    		printf("</td><td> %.2f </td>", 41 / (($row['cumulative3'] - $row['cumulative2'])/MINUTESPERHOUR));
                    		echo "<td> $row[cumulative4]</td><td>";
                    		echo  $row['cumulative4'] - $row['cumulative3'];
                    		printf("</td><td> %.2f </td>",  37 / (($row['cumulative4'] - $row['cumulative3'])/MINUTESPERHOUR));
                    		echo "<td> $row[cumulative5]</td><td>";
                    		echo  $row['cumulative5'] - $row['cumulative4'];
                    		printf("</td><td> %.2f </td>",  42 / (($row['cumulative5'] - $row['cumulative4'])/MINUTESPERHOUR));
                    		printf(" <td> %.2f </td>" , overallSpeed($row['cumulative5']));
                    		echo "</tr>";
                 		}
             		}
                ?>
        </table>
        <p><?php echo $selectResult ?></p>
		<?php		
			function overallSpeed($cumulativeTime4){
			
				return 207 / ($cumulativeTime4 / MINUTESPERHOUR) ;
			}
		?>

    </body>
</html>  