<?php 
   include ('connect.php'); //my connect is on the same work-folder
   
   function masterLoop(){
	$mainTickerFile = fopen("tickerMaster.txt","r");
	while(! feof($mainTickerFile)){
		$companyTicker = fgets($mainTickerFile);
		$companyTicker = trim($companyTicker){
		
			// 14 Starting to Crunch The numbers

			$nextDayInc = 0;
		    $nextDayDec = 0;
		    $nextDayNoC = 0;
		     $total = 0;	
			 
			 $sumOfInc = 0;
		     $sumOfDec = 0;
			 
			 $sqlSel = "SELECT Date, percentage_change FROM $companyTicker WHERE percentage_change < '0' ORDER BY Date ASC"; //
		     $resultSel = mysql_query($sqlSel);
			
			// 15. Getting Tomorrows Date
			 if($resultSel){
			       while($row = mysql_fetch_array($resultSel)){
				$date1 = $row['Date'];
				$percent_change = $row['percentage_change'];
				
				$sql2 = "SELECT Date, percentage_change FROM $companyTicker WHERE Date > '$date1' ORDER BY Date ASC LIMIT 1";
				$resultSel2 = mysql_query($sql2);
				$numOfRows = mysql_num_rows($resultSel2);
				
				// 16. Counting the Days
				if($numOfRows==1){
					 $row2 = mysql_fetch_row($result2);
					 $tom_date = $row2[0];
					   $tom_percent_change = $row2[1];
					   
			   if($tom_percent_change > 0)  {
						   $nextDayIncrease++;
						   $sumofIncreases += $tom_percent_change;
						   $total++;
						   //17.Finishing Analyzing Data
			    }else if($tom_percent_change < 0){
					 $nextDayDecrease++;
					 $sumOfDecreases += $tom_percent_change;
					 $total++;
				} else {
						$nextDayNoChange++;
						$total++;
				}
			 }else if ($numOfRows==0){
				 //no data after today
		   }else{
					echo "You have an error";
			}
	     }		 
       }else{
			echo "unable to select $companyTicker <br />";
		}
		
		$nextDayIncreasePercent = ($nextDayIncrease/$total)*100;
		$nextDayDecreasePercent = ($nextDayDecrease/$total)*100;
		$averageIncreasePercent = $sumOfIncreases/$nextDayIncrease;
		$averageDecreasePercent = $sumOfDecrease/$nextDayDecrease;
		
		// 18. Inserting Into a Result Table
		insertIntoResultTable();
	}	
 }
 
 function insIntoTable($companyTicker, $nextDayIncrease, $nextDayIncreasePer, $avgIncreasePer, $nextDayDecrease, $nextDayDecreasePer, $averageDecreasePer){
	
	$buckyBuyValue = $nextDayIncreasePer * $averageIncreasePercent;
	$buckySellValue = $nextDayDecreasePer * $averageDecreasePercent;
	
	$queryS = "SELECT * FROM analysisA WHERE ticker = '$companyTicker' ";
	$result3 = mysql_query($query);
	$numOfRows2 = mysql_num_rows($result);
	
	if($numOfRows2==1){
		$sql = "UPDATE analysisA SET ticker='$companyTicker',daysInc='$nextDayInc',pctOfDaysInc='$nextDayIncPer',avgIncPer='$avgIncPer',daysDec='$nextDayDec',pctOfDaysDec='$nextDayDecPer',avgDecPer='$avgDecPer', buy='$buckyBuy', sell='$buckySell' ";
		mysql_query($sql);		
	}else{
		$sql = "INSERT INTO analysisA (ticker, daysInc, pctOfDaysInc, avgIncPer, daysDec, pctOfDaysDec, avgDecPer, buy, sell) VALUES('$companyTicker','$nextDayInc','$nextDayIncPer','$avgIncPer','$nextDayDec','$nextDayDecPer','$avgDecPer','$buckyBuy','$buckySell')";
	mysql_query($sql);
	} 
}

masterLoop();	
?> 
