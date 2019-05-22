<?php

require_once 'connection.php';
	/*try
	{
	  $dbUrl = getenv('DATABASE_URL');

	  $dbOpts = parse_url($dbUrl);

	  $dbHost = $dbOpts["host"];
	  $dbPort = $dbOpts["port"];
	  $dbUser = $dbOpts["user"];
	  $dbPassword = $dbOpts["pass"];
	  $dbName = ltrim($dbOpts["path"],'/');

	  $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

	  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch (PDOException $ex)
	{
	  echo 'Error!: ' . $ex->getMessage();
	  die();
	}*/
?>
<!DOCTYPE html>
<html>
	<head>
	  <style>
	    * {
		  text-align: center;
		}
	  </style>
	</head>
	<body>
	<script>
      console.log(<?php echo json_encode($_POST); ?>);
	</script>
	  <h1> Search Results </h1>
		<?php
			foreach ($db->query('SELECT * FROM book WHERE book_title =\''. $_POST["book_title"] . '\'') as $row)
			{
			  echo '<br><a href="search-details.php?book_id=' . $row['book_id'] .'"><strong>' . $row['book_title'] . ' ' . $row['author_id'] . '</strong></a>';
			}
		?>
	</body>
<html>