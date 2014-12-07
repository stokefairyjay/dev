<html>

<head>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<link rel="stylesheet" type="text/css" href="./style.css"> 

</head> 

<body>

<a href="report.php?id=164">report a</a>

            <table align="center"> 

                <tr>

                    <th colspan="2"><h2>Choose a location you would like a report for</h2></th>

                </tr>

                <tr>

                    <td><a href="report.php?id=164" class="black">Exmouth</a></td>

                </tr>

                <tr>   

                    <td><a href="report.php?id=6" class="black">Bude</a></td>

                </tr>

                <tr>

                   <td><a href="report.php?id=164" class="black">Newquay</a></td>

                </tr>

                <tr>

                    <td><a href="report.php?id=7" class="black">Croyde</a></td>

                </tr>

                <tr>    

                    <td><a href="report.php?id=10" class="black">Bantham</a></td>

                </tr>    

            </table>  

  <?php   

session_start();

	$spotId = $_GET["id"];

	if(isset($spotId) && $spotId > 0){ 		
			

		require('MSWFacade.php');

		$MSWFacade = new MSWFacade(); 

		$response = $MSWFacade->getMSWReportAsAssocArray($spotId);

		echo(" <table class='surfreport'>

	  <tr>

		<th>Date</th>

		<th>Swell</th>
		
		<th>Swell Chart</th>

		<th>Period</th>

		<th>Wind</th>
		
		<th>Wind Chart</th>
		
	  </tr>");

		for ($i = 0; $i < sizeof($response); $i++)

		{

			$date = date("l d/m/y",$response[$i]['localTimestamp']);

			$swell = $response[$i]['swell']['components']['combined']['height'];

			$period = $response[$i]['swell']['components']['combined']['period'];

			$windspeed = $response[$i]['wind']['speed'];

			$windDirection = $response[$i]['wind']['compassDirection'];

			$fadedRating = $response[$i]['fadedRating'];

			$solidRating = $response[$i]['solidRating'];

			$swellChart = $response[$i]['charts']['swell'];

			echo("<tr " . $trclass . ">" . "<td>" . $date . "</td> <td>" . $swell . " foot </td> <td> <img src='" . $swellChart ."' alt='swell chart'> </td><td>" . $period . " seconds </td> <td>" .$windspeed . " mph<br>" . $windDirection . "</td> <td> <img src='" . $windChart ."' alt='wind chart'> </td> </tr>");

		}

		echo("</table>");


	}

  ?>


 	</body> 

</html>
