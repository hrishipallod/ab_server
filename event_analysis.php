<?php
	$m=new MongoClient();
	$db=$m->mydb;
	$collection = $db->createCollection("events");
	$cursor= $collection->find();
	$eventList = $collection->distinct("eventName"); /* {"button1", button2"} */
	$eventValueList = $collection->distinct("eventValue"); /* {"pushed", "clicked"} */
	foreach ($cursor as $temp) 
	{
		$eventCollection1 = $db->createCollection($temp['eventName']);
		for($i=0;$i<sizeof($eventList);$i++)
		{
			if((strcmp($temp['eventName'],$eventList[$i])==0))
			{
				for($j=0;$j<sizeof($eventValueList);$j++)
				{		
				  if(strcmp($temp['eventValue'],$eventValueList[$j])==0)
				  {

						if($eventCollection1->count(array('eventValue'=>$eventValueList[$j]))==0)
						{
							//abMode 0
							$eventDoc1 = array('eventValue' => $eventValueList[$j], 
												'abMode' => 0, 'Count' => 0
												);
							$eventCollection1->insert($eventDoc1);
							//abMode 1
							$eventDoc1 = array('eventValue' => $eventValueList[$j], 
												'abMode' => 1, 'Count' => 0
												);
							$eventCollection1->insert($eventDoc1);			
						}
						else if($temp['abMode']==0)
						{
						
							$cursor1 = $eventCollection1->find();
							foreach ($cursor1 as $temp1) 
							{
								# code...
								if((strcmp($temp1['eventValue'],$eventValueList[$j])==0)&&$temp1['abMode']==0)
								{	
									$eventCollection1->update(array('eventValue'=>$eventValueList[$j],'abMode'=>0), array('$set'=>array("Count"=> ++$temp1['Count'])));
								}
							}		
						}
						else
						{
							$cursor1 = $eventCollection1->find();
							foreach ($cursor1 as $temp1) 
							{
								# code...
								if((strcmp($temp1['eventValue'],$eventValueList[$j])==0)&&$temp1['abMode']==1)
								{
									$eventCollection1->update(array('eventValue'=>$eventValueList[$j],'abMode'=>1), array('$set'=>array("Count"=> ++$temp1['Count'])));
									
								}
							}
						}
				  	}
				}
			}
		}
	}
?>

