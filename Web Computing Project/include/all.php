
<?php		include('include/project_connect_db.inc');
$result = $pdo ->prepare("SELECT name, suburb FROM hotspots");
$result->execute();

while ($row = $result->fetch(PDO::FETCH_ASSOC))
{
$name = $row['name'];
$suburb = $row['suburb']; }
echo $name;
echo $suburb; ?>
