<?php
	mysql_connect("dawnphlebo.db.7501208.hostedresource.com", "dawnphlebo", "AQP34nlR!") or die("Error connecting to database: ".mysql_error());
	/*		
		if connection fails it will stop loading the page and display an error
	*/
	
	mysql_select_db("dawnphlebo") or die(mysql_error());
	/* this is the database */
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Welcome to Phlebo</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body bgcolor="771b61">
<center><img src="images/phleblogo.png"></center>
<h4 style="color:#fff" align="center">Phlebo found the following tests... Not what you wanted? Search again:</h4>
<center><form action="search.php" method="GET">
		<input type="text" name="query" />
		<input type="submit" value="Search" />
	</form></center><br>
<?php
	$query = $_GET['query']; 
	// gets value sent over search form
	
	$min_length = 3;
	// you can set minimum length of the query if you want
	
	if(strlen($query) >= $min_length){ // if query length is more or equal minimum length then
		
		$query = htmlspecialchars($query); 
		// changes characters used in html to their equivalents, for example: < to &gt;
		
		$query = mysql_real_escape_string($query);
		// makes sure nobody uses SQL injection
		
		$raw_results = mysql_query("SELECT * FROM PhleboTests
			WHERE (`TestLabName` LIKE '%".$query."%') OR (`TestLabAltName1` LIKE '%".$query."%') OR (`TestLabAltName2` LIKE '%".$query."%')") or die(mysql_error());
			

		// '%$query%' is what we're looking for, % means anything, for example if $query is Hello
		// it will match "hello", "Hello man", "gogohello", if you want exact match use `title`='$query'
		// or if you want to match just full word so "gogohello" is out use '% $query %' ...OR ... '$query %' ... OR ... '% $query'
		
		if(mysql_num_rows($raw_results) > 0){ // if one or more rows are returned do following
			
			while($results = mysql_fetch_array($raw_results)){
			// $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop
			
				echo "<table align=center bgcolor=#ffffff width=70%><tr>
						<th width=40%><ul style=font-family:sans-serif;list-style:none;padding:10px>
						<li><h2>".$results['TestLabName']."</h2></li>
						<li>".$results['TestLabAltName1']."</li>
						<li>Tube:<br><img src=images/".$results['TestLabTube'].".jpg><img src=images/".$results['TestLabSecondTube'].".jpg><img src=images/".$results['TestLabOnIce'].".jpg><img src=images/".$results['TestLabProtect'].".jpg></li>
						<li><b>Minimum:</b>&nbsp;".$results['TestLabMin']."mL</li>
						</ul></th>
						<th><ul style=font-family:sans-serif;list-style:none;padding:20px>
						<li><b>Procedure:</b>&nbsp;".$results['TestLabProcedure']."</li>
						<li>-------</li>
						<li><b>Notes:</b>&nbsp;".$results['TestLabNotes']."</li>
						<li>-------</li>
						<li><b>Alternate Specimen:<br><img width=100px height=175px src=images/".$results['TestLabAlt1'].".jpg></li>
						</ul></th>
						</tr>
						</table><br><br>";
				// posts results gotten from database(title and text) you can also show id ($results['id'])
			}

			
		}
		else{ // if there is no matching rows do following
			echo "No tests were found.";
		}
		
	}
	else{ // if query length is less than minimum
		echo "Minimum length is ".$min_length;
	}
?>
<table bgcolor="#c0c0c0" style="width:100%">
  <tr>
    <th><b>Tests by Category:</b> <a href="category.php?query=kidney">Kidney</a> | <a href="category.php?query=liver">Liver</a> | <a href="category.php?query=thyroid">Thyroid</a> | <a href="category.php?query=metal">Heavy Metals</a> |</th>
   </tr>
</table>
<br><br></body>
</html>