<?php
	$host = "mysql1.000webhost.com";
  	$dbname = "a8773318_acebedo";
  	$dbuser = "a8773318_acebedo";
  	$pwd = "";
  	$dbc =0;
  	$dbc = mysqli_connect($host, $dbuser, $pwd, $dbname)
        or die ('Cannot connect to database');
require_once "./includes/header.inc.php";

$output = 'No product information';

// GET PRODUCT INFORMATION
	if (isset($_GET['pid'])); {

		$product_code = trim($_GET['pid']);
		$query2 = "SELECT * FROM `products` WHERE `productCode` = '$product_code'";
		$result = mysqli_query($dbc, $query2)
			or die ("Error query database => $query2");

		$num_rows = mysqli_num_rows($result);

		if ($num_rows != 0) {

			while ($row = mysqli_fetch_array($result)) {

				$product_code = $row['productCode'];
				$name = $row['productName'];
				$product_line = $row['productLine'];
				$scale = $row['productScale'];
				$vendor = $row['productVendor'];
				$description = $row['productDescription'];
				$quantity = $row['quantityInStock'];
				$buyPrice = $row['buyPrice'];
				
				$output = "<p><em>Name:</em> $name</p>
							<p><em>Product Line:</em> $product_line</p>
							<p><em>Product Scale:</em> $scale</p>
							<p><em>Vendor:</em> $vendor</p>
							<p><em>Description:</em> $description</p>
							<p><em>Buy Price: $</em>$buyPrice</p>";

			} // END WHILE MYSQLI_FETCH_ARRAY
		} else {

			$output = 'No match found';
		} 

	} //END IF/ELSE ISSET

// HEADER RIGHT HERE
?>

<body>
	<div>
		<!-- HEADER  -->
		<div>
			<h2>Classic Car</h2>

			<div>
				<?=$output ?>
			</div>


		</div>
		<!-- FOOTER HERE -->
	</div>


</body>
