<?php
	include('project_connect_db.inc');
	try
	{
		$result = $pdo->query('SELECT name, address, suburb, rating, review '.
			'FROM items, reviews '.
			'WHERE items.name LIKE '%$search_query%' OR items.address LIKE '%$search_query%' OR items.suburb LIKE '%$search_query%' ');
	}
	catch (PDOException $e)
	{
		echo $e->getMessage();
	}

	 echo '<table border="solid" width="100%">';
	foreach ($result as $item)
	{
		echo '<tr>';
		echo "<td>{$item['name']}</td><td>{$item['address']}</td><td>{$item['suburb']}</td><td align=\"right\">\${$review['rating']}</td><td>{$review['review']}</td>";
		echo '<td><img width="100px" src="p_images/',$item['Picture'],'"></td>';
		echo '<td><a href="sample.php?item=', $item['ID'],'">I am a Sample</a></td>';
		echo '</tr>';
	}
	echo '</table>';
?>
