<?php 
 
    $host = "mysql1.000webhost.com";
  	$dbname = "a8773318_acebedo";
  	$dbuser = "a8773318_acebedo";
  	$pwd = "";
  	$dbc =0;
  	$dbc = mysqli_connect($host, $dbuser, $pwd, $dbname)
        or die ('Cannot connect to database');
	
	$query = "SELECT * FROM `products` WHERE `productLine`='Vintage Cars' OR `productLine`='Trains' ORDER BY `productName` DESC LIMIT 10";
	
	$data = mysqli_query($dbc, $query)
		 		or die ('Error querying database');

	header('Content-Type: text/xml; charset=ISO-8859-1');
	echo '<?xml version="1.0" encoding="ISO-8859-1"?>';
	$builddate = gmdate(DATE_RSS, time());

?>

<rss version="2.0">
	<channel>
		<title>Classic Cars RSS</title>
		<description>Classic Cars RSS feed for learning PHP</description>
		<lastBuildDate><?= $builddate ?></lastBuildDate>
		<language>en-us</language>
<?php
		while ($rows = mysqli_fetch_array($data)) {
			$product_code = $rows['productCode'];
			$name = $rows['productName'];
			$product_line = $rows['productLine'];
			$scale = $rows['productScale'];
			$vendor = $rows['productVendor'];
			$description = $rows['productDescription'];
			$msrp = $rows['MSRP'];
		 	?>
		<item>
			<title><?=$name ?></title>
			<description><?= $description ?></description>
			<link>http://3aces.net63.net/PHP_ASSIGNMENT_9/product.php?pid=<?=$product_code ?> </link>
			<guid isPermaLink="false">http://3aces.net63.net/PHP_ASSIGNMENT_9/product.php?pid=<?=$product_code ?></guid>
		</item>

<? }  ?>

	</channel>

</rss>
