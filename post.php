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
	
   /*$data  = array("dev_id"=>200, "app_id"=>1, "activities"=>[
            "activity_name"=>"MainActivity",
            "item_name"=>"button1",
            "a"=>12,
            "total_a"=>15,
            "b"=>12,
            "total_b"=>15]);
   */
   //var_dump($data);
	
   $m = new MongoClient();
   $db = $m->mydb;
   $collection = $db->app_details;
   

   //$cursor = $collection->find(array("dev_id"=>$data["dev_id"], "app_id"=>$data["app_id"])); 
   //var_dump($data["activities"]["activity_name"]);
   /*foreach($cursor as $document)
      $old = $document["activities"];
   */
   //var_dump($old["activity_name"]);
   
   /*
   foreach($data["activities"] as $new)
   {
      var_dump($new);
      foreach($old as $a)
      {
         var_dump($a["activity_name"]);
         
         if($a[trim("activity_name")] == $b[trim("activity_name")] && $a['item_name'] == $b['item_name'])
         {
            $b["a"] = $b["a"] + $a["a"];
            $b["total_a"] = $b["total_a"] + $a["total_a"];
            $b["b"] = $b["b"] + $a["b"];
            $b["total_b"] = $b["total_b"] + $a["total_b"];
         }
         
      }
      
   }
   */
   //$collection->remove(array("dev_id"=>$data["dev_id"], "app_id"=>$data["app_id"]));
   $collection->insert($data);
   //echo "Document inserted successfully";
   
?>	