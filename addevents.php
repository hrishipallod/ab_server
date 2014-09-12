<?php
	$data = json_decode(file_get_contents('php://input'), true);
	$m = new MongoClient();
	$db = $m->mydb;
	$collection = $db->createCollection("events");
	for($i=0;$i<sizeof($data);$i++)
	{
		$collection->insert($data[$i]);
	}

?>