<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

	<title>Welcome to Phlebo</title>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<link rel="stylesheet" type="text/css" href="style.css"/>

</head>

<body bgcolor="#771b61">

<center>
	<img src="images/phleblogo.png">

	<p style="color:#fff">Phlebo is a way for you to search for information on laboratory tests specific to your hospital.</p>

	<h3 style="color:#fbaf5d">Search for a test...</h3>

	<form action="search.php" method="GET">

		<input type="text" name="query" />

		<input type="submit" value="Search" />

	</form><br><br>

</center>

<table bgcolor="#c0c0c0" style="width:100%">

  <tr>

    <th><b>Tests by Category:</b> <a href="category.php?query=kidney">Kidney</a> | <a href="category.php?query=liver">Liver</a> | <a href="category.php?query=thyroid">Thyroid</a> | <a href="category.php?query=metal">Heavy Metals</a> |</th>

   </tr>

</table>

</body>

</html>
