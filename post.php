<?php
   // connect to mongodb
   $m = new MongoClient();
   echo "Connection to database successfully";
   // select a database
   $db = $m->mydb;
   echo "Database mydb selected";
   $collection = $db->createCollection("app_details");


   echo "Collection created succsessfully";
   $document = json_decode(file_get_contents('php://input'), true);
   $flag=0;
   $i=0;
   $cursor = $collection->find();
   foreach ($cursor as $temp) 
   {
      #code...
      if((strcmp($temp['activities'][0]['activity_name'],$document['activities'][0]['activity_name'])!=0))
      {
         $appid=$temp['app_id'];
         $collection->remove(array("app_id"=>$appid));
         break;
      }
      if($temp['app_id']==$document['app_id'])
      {

         for($i=0;$i<4;$i++)
         {

            if((strcmp($temp['activities'][$i]['activity_name'],$document['activities'][$i]['activity_name'])==0)&&(strcmp($temp['activities'][$i]['item_name'],$document['activities'][$i]['item_name'])==0))
            {
               $flag=1;
               $total_a2=$document['activities'][$i]['total_a'];
               $total_b2=$document['activities'][$i]['total_b'];
               $a2=$document['activities'][$i]['a'];
               $b2=$document['activities'][$i]['b'];

               $total_a1=$temp['activities'][$i]['total_a'];
               $total_b1=$temp['activities'][$i]['total_b'];
               $a1=$temp['activities'][$i]['a'];
               $b1=$temp['activities'][$i]['b'];

               $document['activities'][$i]['total_a']=$total_a2+$total_a1;
               $document['activities'][$i]['total_b']=$total_b2+$total_b1;

               $document['activities'][$i]['a']=$a1+$a2;
               $document['activities'][$i]['b']=$b1+$b2;
            }
         }
         $appid=$temp['app_id'];
         $collection->remove(array("app_id"=>$appid));
         $collection->insert($document);
      }

   }
   if($flag!=1)
   {
      $collection->insert($document);
   }
   
   echo "Document inserted successfully";

?>




