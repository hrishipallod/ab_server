<?php
$value = array();
$flag = (int)date("sa") % 2;
if($flag == 0)
{
	$value[] = array('button1' => "Add", 'button2' => "Show");
}
else
{
	$value[] = array('button1' => "Insert", 'button2' => "View");
}
echo json_encode($value);
?>