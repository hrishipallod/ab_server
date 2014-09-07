<?php
 /*
// connect to mongodb
   $m = new MongoClient();
   echo "Connection to database successfully";
   // select a database
   $db = $m->mydb;
   echo "Database mydb selected";
   $collection = $db->createCollection("mycol");
   echo "Collection created succsessfully";
   
   // connect to mongodb
   $m = new MongoClient();
   echo "Connection to database successfully";
   // select a database
   $db = $m->mydb;
   echo "Database mydb selected";
   $collection = $db->mycol;
   echo "Collection selected succsessfully";
   $document = array( 
      "title" => "MongoDB", 
      "description" => "database", 
      "likes" => 100,
      "url" => "http://www.tutorialspoint.com/mongodb/",
      "by", "tutorials point"
   );
   $collection->insert($document);
   echo "Document inserted successfully";
   */
   $data = json_decode(file_get_contents('php://input'), true);
	var_dump($data);
	 $m = new MongoClient();
   echo "Connection to database successfully";
   // select a database
   $db = $m->mydb;
   echo "Database mydb selected";
   $collection = $db->mycol;
   echo "Collection selected succsessfully";
   $collection->insert($data);
   echo "Document inserted successfully";
?>