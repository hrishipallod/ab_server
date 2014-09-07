<html>
<body>
<?php
   $m = new MongoClient();

   $db = $m->mydb;
   $collection = $db->developer;
   $cnt = $collection->count();
   if($cnt == 0){
      $new_id=200;
   }
   else{
      $cursor = $collection->find();
      foreach($cursor as $document)
         $new_id = $document['_id'];
      $new_id = $new_id + 1;
   }
   echo "$new_id"; 
   /* , "apps" =>["app_name" =>$_POST["app_name"]] */
   $document = array("_id"=> $new_id, "name" => $_POST["name"], "email" => $_POST["email"]);
   $collection->insert($document);
?>
</form>
</body>
</html>