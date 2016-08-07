<?php
	include('include/project_connect_db.inc');
	try
	{
		$result = $pdo->query('SELECT name, address, suburb, rating, review, Picture '.
			'FROM items, reviews '.
			'WHERE items.name LIKE '%chermside%' ');
	}
	catch (PDOException $e)
	{
		echo $e->getMessage();
	}

	echo '<table border="solid" width="80%">';
	foreach ($result as $item)
	{
		echo '<tr>';
		echo "<td>{$item['name']}</td><td>{$item['address']}</td><td>{$item['suburb']}</td><td>{$item['review']}</td><td{$item['rating']}</td>";
		echo '<td><a href="####.php?item=', $item['user_id'],'">Sample Page</a></td>';
		echo '</tr>';
	}
	echo '</table>';
?>
