<html>
<body>
<?php
   $m = new MongoClient();
   ?><br>
   <?php
   $db = $m->mydb;
   $dev_id = 200;
   $dev_profile = $db->developer;
   $collection = $db->app_details;
   //$cnt = $dev_profile->count(array('_id'=>$dev_id));
   $cnt1 = $collection->count(array('dev_id'=>$dev_id));
   
   if($cnt1 == 0){
      $new_app_id=1;
   }
   else{
      $cursor = $collection->find(array('dev_id'=>$dev_id));
      foreach($cursor as $document)
         $new_app_id = $document['app_id'];
      $new_app_id = $new_app_id + 1;
   }
   echo "YOUR APP ID :   $new_app_id"; 
   /* , "apps" =>["app_name" =>$_POST["app_name"]] */
   $document = array("dev_id"=> $dev_id, "app_id"=>$new_app_id);
   $collection->insert($document);
   
   ?><br><br>
   <?php
?><br><br>
<?php
   echo "Successfully Registered!";
?>
</form>
</body>
</html>